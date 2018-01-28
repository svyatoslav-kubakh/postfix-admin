<?php
namespace backend\models;

use common\models\User as BaseUser;

class User extends BaseUser
{
    const ADMIN_ID = 1;

    public function isDeleteAllowed()
    {
        return $this->id != self::ADMIN_ID;
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
