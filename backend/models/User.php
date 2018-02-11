<?php
namespace backend\models;

use common\models\User as BaseUser;

class User extends BaseUser implements LoggableInterface
{
    const ADMIN_ID = 1;

    public function isDeleteAllowed()
    {
        return $this->id != self::ADMIN_ID;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['password'], 'string', 'min' => 6],
            [['auth_key'], 'default', 'value' => function () {
                return $this->generateAuthKey();
            }],
        ]);
    }

    public function getPassword()
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'UserName',
            'status' => 'Status',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
        ];
    }
}
