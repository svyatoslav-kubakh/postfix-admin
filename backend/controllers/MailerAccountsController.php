<?php

namespace backend\controllers;

use Yii;
use backend\models\MailerAccount;
use backend\models\MailerDomain;
use backend\models\search\MailerAccountSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * MailerAccountsController implements the CRUD actions for MailerAccount model.
 * @method MailerAccount findModel($id)
 */
class MailerAccountsController extends Controller
{
    /**
     * @var string
     */
    protected $modelClass = MailerAccount::class;

    /**
     * Lists all MailerAccount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MailerAccountSearch();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $searchModel
                ->search(Yii::$app->request->queryParams),
        ]);
    }

    /**
     * Displays a single MailerAccount model.
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
     * Creates a new MailerAccount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MailerAccount();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $password  = $model->generatePassword();
            if ($model->save(false)) {
                $this
                    ->addFlashMessage('Account created: ' . $model->email, self::FLASH_SUCCESS)
                    ->addFlashMessage('New password: ' . $password);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MailerAccount model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $request = Yii::$app->request;
        if ($model->load($request->post()) && $model->validate()) {
            $password = null;
            if (!empty($request->post($model->formName())['password'])) {
                $password  = $model->generatePassword();
            }
            if ($model->save(false)) {
                $this->addFlashMessage('Account updated: ' . $model->email, self::FLASH_SUCCESS);
                if ($password) {
                    $this->addFlashMessage('New password: ' . $password);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MailerAccount model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            $this->addFlashMessage('Account deleted: ' . $model->email, self::FLASH_WARNING);
        }
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
