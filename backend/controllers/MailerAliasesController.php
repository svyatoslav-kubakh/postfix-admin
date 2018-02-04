<?php
namespace backend\controllers;

use Yii;
use backend\models\MailerAlias;
use backend\models\MailerDomain;
use backend\models\search\MailerAliasSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * MailerAliasesController implements the CRUD actions for MailerAlias model.
 * @method MailerAlias findModel($id)
 */
class MailerAliasesController extends Controller
{
    /**
     * @var string
     */
    protected $modelClass = MailerAlias::class;

    /**
     * Lists all MailerAlias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MailerAliasSearch();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $searchModel
                ->search(Yii::$app->request->queryParams),
        ]);
    }

    /**
     * Displays a single MailerAlias model.
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
     * Creates a new MailerAlias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MailerAlias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MailerAlias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MailerAlias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * @inheritdoc
     */
    public function render($view, $params = [])
    {
        return parent::render($view, $params + [
            'domainsList' => MailerDomain::find()
                ->getListValues(),
        ]);
    }
}
