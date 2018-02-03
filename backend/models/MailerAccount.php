<?php
namespace backend\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "mailer_users".
 *
 * @property int $id
 * @property int $domain_id
 * @property string $email
 * @property string $password
 * @property string $meta
 */
class MailerAccount extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mailer_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_id', 'email', 'password', 'meta'], 'required'],
            [['domain_id'], 'integer'],
            [['email'], 'string', 'max' => 120],
            [['password'], 'string', 'max' => 106],
            [['meta'], 'string', 'max' => 4000],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain ID',
            'email' => 'Email',
            'password' => 'Password',
            'meta' => 'Meta',
        ];
    }
}
