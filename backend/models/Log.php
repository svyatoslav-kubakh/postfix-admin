<?php
namespace backend\models;

use common\models\Log as BaseLog;

class Log extends BaseLog
{
    const ENTITY_MAILER_DOMAIN = 2;
    const ENTITY_MAILER_ACCOUNT = 3;
    const ENTITY_MAILER_ALIAS = 4;

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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'user_ip' => 'User Ip',
            'item_type' => 'Item Type',
            'item_id' => 'Item ID',
            'action' => 'Action',
            'data_from' => 'Data From',
            'data_to' => 'Data To',
            'log_date' => 'Log Date',
        ];
    }
}
