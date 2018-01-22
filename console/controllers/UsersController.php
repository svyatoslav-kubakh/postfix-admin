<?php
namespace console\controllers;

use Yii;
use yii\db\ActiveQuery;
use yii\i18n\Formatter;
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

    public $userName;

    /** @var ActiveQuery */
    protected $userRepository;

    /** @var Formatter */
    protected $formatter;

    public function init()
    {
        parent::init();
        $this->userRepository = User::find();
        $this->formatter = Yii::$app->formatter;
    }

    public function options($actionID)
    {
        return [
            'userName',
        ];
    }

    public function optionAliases()
    {
        return [
            'u' => 'userName',
        ];
    }

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
                    $this->formatter->asDatetime($user->updated_at, 'short'),
                ];
            }, $this->userRepository->all()),
        ]);
    }

    /**
     * Change password
     */
    public function actionPasswd()
    {
        $user = $this->userRepository
            ->where([ 'username' => $this->userName ])
            ->one();
        if (!$user) {
            $this->stderr("User not found\n");
            return ExitCode::DATAERR;
        }
        return ExitCode::OK;
    }
}
