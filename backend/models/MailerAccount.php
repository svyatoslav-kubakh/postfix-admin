<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "mailer_users".
 *
 * @property int $id
 * @property int $domain_id
 * @property string $email
 * @property string $password
 * @property MailerDomain $domain
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
            [['email'], 'unique'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(MailerDomain::class, ['id' => 'domain_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
