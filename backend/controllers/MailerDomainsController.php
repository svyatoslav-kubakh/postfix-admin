<?php
namespace backend\controllers;

use Yii;
use backend\models\MailerDomain;
use backend\models\search\MailerDomainSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * MailerDomainController implements the CRUD actions for MailerDomain model.
 * @method MailerDomain findModel($id)
 */
class MailerDomainsController extends Controller
{
    /**
     * @var string
     */
    protected $modelClass = MailerDomain::class;

    /**
     * Lists all MailerDomain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MailerDomainSearch();
        return $this->render('index', [
            'dataProvider' => $searchModel
                ->search(Yii::$app->request->queryParams),
        ]);
    }

    /**
     * Displays a single MailerDomain model.
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
     * Creates a new MailerDomain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MailerDomain();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this
                ->addFlashMessage('Mailer domain created: ' . $model->name, self::FLASH_SUCCESS)
                ->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MailerDomain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this
                ->addFlashMessage('Mailer domain updated: ' . $model->name, self::FLASH_SUCCESS)
                ->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MailerDomain model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            $this->addFlashMessage('Mailer domain deleted: ' . $model->name, self::FLASH_WARNING);
        }
        return $this->redirect(['index']);
    }
}
