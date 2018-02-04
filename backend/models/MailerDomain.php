<?php
namespace backend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "mailer_domains".
 * @property int $id
 * @property string $name
 * @property MailerAccount[] $accounts
 * @property MailerAlias[] $aliases
 */
class MailerDomain extends ActiveRecord
{
    const DOMAIN_PATTERN = '/^(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(?::\d{1,5})?(?:$|[?\/#])/i';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mailer_domains';
    }

    /**
     * @return query\MailerDomainQuery
     */
    public static function find()
    {
        return new query\MailerDomainQuery(get_called_class());
    }

    /**
     * @return ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(MailerAccount::class, ['domain_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getAliases()
    {
        return $this->hasMany(MailerAlias::class, ['domain_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'match', 'pattern' => self::DOMAIN_PATTERN],
            [['name'], 'unique'],
        ];
    }

    /**
     * @return bool
     */
    public function isDeleteAllowed()
    {
        return !$this->getAccounts()->count() && !$this->getAliases()->count();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Domain',
        ];
    }
}
