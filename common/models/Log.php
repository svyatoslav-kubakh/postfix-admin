<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property string $user
 * @property int $user_ip
 * @property int $item_type
 * @property int $item_id
 * @property string $action
 * @property string $old_data
 * @property string $new_data
 * @property integer $log_date
 */
class Log extends ActiveRecord
{
    const ACTION_OTHER = 0;
    const ACTION_CREATE = 1;
    const ACTION_UPDATE = 2;
    const ACTION_DELETE = 3;

    const ENTITY_UNKNOWN = 0;
    const ENTITY_USER = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%logs}}';
    }

    /**
     * @return query\LogQuery
     */
    public static function find()
    {
        return new query\LogQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_type', 'item_id', 'action'], 'required'],
            [['item_type', 'item_id', 'action', 'user_ip'], 'integer'],
            [['old_data', 'new_data'], 'string'],
            [['user', 'old_data', 'new_data'], 'default', 'value' => ''],
            [['user_ip'], 'default', 'value' => 0],
            [['log_date'], 'default', 'value' => function () {
                return time();
            }],
        ];
    }
}
