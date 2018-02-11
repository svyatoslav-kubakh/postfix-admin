<?php
namespace backend\models;

use common\models\Log as BaseLog;

/**
 * This is the model class for table "logs".
 * @property int $id
 * @property string $user
 * @property string $user_ip
 * @property int $item_type
 * @property int $item_id
 * @property int $action
 * @property string $data_from
 * @property string $data_to
 * @property int $log_date
 */
class Log extends BaseLog
{
    const ACTION_LOGIN = 4;
    const ACTION_LOGOUT = 5;

    const ENTITY_MAILER_DOMAIN = 2;
    const ENTITY_MAILER_ACCOUNT = 3;
    const ENTITY_MAILER_ALIAS = 4;

    /**
     * @return array
     */
    public static function listItemTypes()
    {
        return [
            self::ENTITY_USER => 'users',
            self::ENTITY_MAILER_DOMAIN => 'mailer-domains',
            self::ENTITY_MAILER_ACCOUNT => 'mailer-accounts',
            self::ENTITY_MAILER_ALIAS => 'mailer-aliases',
        ];
    }

    /**
     * @return array
     */
    public static function listActions()
    {
        return [
            self::ACTION_CREATE => 'create',
            self::ACTION_UPDATE => 'update',
            self::ACTION_DELETE => 'delete',
            self::ACTION_LOGIN => 'login',
            self::ACTION_LOGOUT => 'logout',
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'user_ip' => 'IP',
            'item_type' => 'Item Type',
            'item_id' => 'Item ID',
            'action' => 'Action',
            'data_from' => 'Data From',
            'data_to' => 'Data To',
            'log_date' => 'Log Date',
        ];
    }
}
