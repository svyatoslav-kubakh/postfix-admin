<?php
namespace console\controllers;

use Yii;
use yii\console\Exception;
use yii\db\ActiveRecord;
use yii\console\ExitCode;
use yii\console\Controller;
use yii\console\widgets\Table;
use common\models\User;

/**
 * Manage system users
 */
class UsersController extends Controller
{
    public $defaultAction = 'list';

    /**
     * List users
     */
    public function actionList()
    {
        echo Table::widget([
            'headers' => ['User', 'Status', 'Modified'],
            'rows' => array_map(function (User $user) {
                return [
                    $user->username,
                    $user->status === User::STATUS_ACTIVE ? 'Active' : '',
                    Yii::$app->formatter
                        ->asDatetime($user->updated_at, 'short'),
                ];
            }, User::find()->all()),
        ]);
    }

    /**
     * Enable user
     * @param string $username User login
     * @return int
     */
    public function actionEnable($username)
    {
        $user = $this->findModel($username);
        $user->status = User::STATUS_ACTIVE;
        $user->save();
        $this->stdout("Successfully enabled\n");
        return ExitCode::OK;
    }

    /**
     * Disable user
     * @param string $username User login
     * @return int
     */
    public function actionDisable($username)
    {
        $user = $this->findModel($username);
        $user->status = User::STATUS_DELETED;
        $user->save();
        $this->stdout("Successfully disabled\n");
        return ExitCode::OK;
    }

    /**
     * Change password
     * @param string $username User login
     * @return int
     */
    public function actionPasswd($username)
    {
        $user = $this->findModel($username);
        $password = $this->prompt('Please, input new password:', [
            'required' => true,
            'validator' => function ($input, &$error) {
                if (strlen($input) < 6) {
                    $error = 'Password must be at least 6 characters';
                    return false;
                }
                return true;
            },
        ]);
        $user->setPassword($password);
        if (!$user->save()) {
            $this->stderr($user->getFirstError('password'));
            return ExitCode::DATAERR;
        }
        $this->stdout("Successfully changed\n");
        return ExitCode::OK;
    }

    /**
     * @param string $username
     * @return User|null|ActiveRecord
     * @throws Exception
     */
    protected function findModel($username)
    {
        $user = User::find()
            ->where([ 'username' => $username ])
            ->one();
        if (!$user) {
            throw new Exception('User not found');
        }
        return $user;
    }
}
