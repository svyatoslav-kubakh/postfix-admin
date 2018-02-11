<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use backend\components\Controller;
use backend\models\Log;
use backend\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access']['rules'] = [
            [
                'actions' => ['login', 'error'],
                'allow' => true,
            ],
            [
                'actions' => ['logout', 'index'],
                'allow' => true,
                'roles' => ['@'],
            ],
        ];
        $behaviors['verbs'] = [
            'class' => VerbFilter::class,
            'actions' => [
                'logout' => ['post'],
            ],
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->logUserAction(Log::ACTION_LOGIN);
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $this->logUserAction(Log::ACTION_LOGOUT);
        return $this->goHome();
    }

    /**
     * @param string $action
     * @param bool $saveOldData
     * @param bool $saveNewData
     */
    protected function logUserAction($action, $saveOldData = false, $saveNewData = false)
    {
        $user = new User(Yii::$app->user->identity);
        Log::find()
            ->createLogEntity($user, $action, $saveOldData, $saveNewData)
            ->save();
    }
}
