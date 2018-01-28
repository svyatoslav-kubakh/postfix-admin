<?php
namespace backend\controllers;

use Yii;
use backend\models\search\UserSearch;
use backend\components\Controller;

/**
 * Site controller
 */
class UsersController extends Controller
{
    /**
     * Displays homepage.
     *
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
}
