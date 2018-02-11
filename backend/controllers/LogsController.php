<?php

namespace backend\controllers;

use Yii;
use backend\models\Log;
use backend\models\search\LogSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogsController implements the CRUD actions for Log model.
 */
class LogsController extends Controller
{
    /**
     * @var string
     */
    protected $modelClass = Log::class;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Log models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Log model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function render($view, $params = [])
    {
        return parent::render($view, $params + [
                'itemTypes' => Log::listItemTypes(),
                'itemActions' => Log::listActions(),
            ]);
    }
}
