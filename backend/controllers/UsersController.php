<?php
namespace backend\controllers;

use Yii;
use backend\models\Log;
use backend\models\User;
use backend\models\search\UserSearch;
use backend\models\search\LogSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * MailerDomainController implements the CRUD actions for User model.
 * @method User findModel($id)
 */
class UsersController extends Controller
{
    /**
     * @var string
     */
    protected $modelClass = User::class;

    /**
     * Lists all User models.
     * @return mixed
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

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user = $this->findModel($id);
        $logsSearchModel = new LogSearch();
        $logsDataProvider = $logsSearchModel->search([
            'LogSearch' => ['user' => $user->username],
        ]);
        $logsDataProvider->pagination = false;
        return $this->render('view', [
            'model' => $user,
            'logsDataProvider' => $logsDataProvider,
            'itemTypes' => Log::listItemTypes(),
            'itemActions' => Log::listActions(),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this
                ->addFlashMessage('User created: ' . $model->username, self::FLASH_SUCCESS)
                ->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
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
                ->addFlashMessage('User updated: ' . $model->username, self::FLASH_SUCCESS)
                ->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            $this->addFlashMessage('User deleted: ' . $model->username, self::FLASH_WARNING);
        }
        return $this->redirect(['index']);
    }
}
