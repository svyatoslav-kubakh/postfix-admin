<?php
namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\search\UserSearch;
use backend\components\Controller;

class UsersController extends Controller
{
    /**
     * @var string
     */
    protected $modelClass = User::class;

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        return $this->render('update', [
            'model' => $this->findModel($id),
        ]);
    }
}
