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
    const PASSWORD_CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    const PASSWORD_LENGTH = 8;

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
            [['domain_id', 'email'], 'required'],
            [['domain_id'], 'exist', 'targetClass' => MailerDomain::class, 'targetAttribute' => 'id'],
            [['email'], 'string', 'max' => 120],
            [['email'], 'filter', 'filter' => function ($value) {
                return $value . '@' . $this->domain->name;
            }],
            [['email'], 'unique', 'targetAttribute' => ['domain_id', 'email'], 'message' => 'Email is not unique'],
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
     * Generates new password hash and sets it to the model
     * @return string
     */
    public function generatePassword()
    {
        $this->password = $this->generatePasswordHash(
            $password = $this->randomPassword()
        );
        return $password;
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
            'password' => 'Change Password',
        ];
    }

    protected function generatePasswordHash($string)
    {
        return crypt($string, '$6$'.substr(md5(rand(1, 10000)), -16));
    }

    protected function randomPassword($length = self::PASSWORD_LENGTH)
    {
        return substr(str_shuffle(str_repeat(self::PASSWORD_CHARS, 3)), 0, $length);
    }
}
