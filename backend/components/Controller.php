<?php
namespace backend\components;

use yii\base\InvalidConfigException;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\db\ActiveRecord;

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
        ];
    }

    protected function findModel($id)
    {
        if ($this->modelClass === null) {
            throw new InvalidConfigException('The "modelClass" property must be set.');
        }
        if (($model = $this->modelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested item does not exist.');
        }
    }
}
