<?php
namespace backend\components;

use yii\base\InvalidConfigException;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\db\ActiveRecord;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class Controller extends \yii\web\Controller
{
    /**
     * @var string | null | ActiveRecord
     */
    protected $modelClass;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Finds the MailerDomain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer | string $id
     * @return ActiveRecord
     * @throws InvalidConfigException
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if ($this->modelClass === null) {
            throw new InvalidConfigException('The "modelClass" property must be set.');
        }
        if (($model = $this->modelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
