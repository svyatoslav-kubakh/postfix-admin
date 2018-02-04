<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "mailer_aliases".
 * @property int $id
 * @property int $domain_id
 * @property string $source
 * @property string $destination
 * @property MailerDomain $domain
 */
class MailerAlias extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mailer_aliases';
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
    public function rules()
    {
        return [
            [['domain_id', 'source', 'destination'], 'required'],
            [['domain_id'], 'exist', 'targetClass' => MailerDomain::class, 'targetAttribute' => 'id'],
            [['source', 'destination'], 'string', 'max' => 100],
            [['domain_id', 'source', 'destination'], 'unique',
                'targetAttribute' => ['domain_id', 'source', 'destination'], 'message' => 'Alias is not unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain',
            'source' => 'Source',
            'destination' => 'Destination',
        ];
    }

    public function __toString()
    {
        return $this->domain->name . ': ' . $this->source . ' => '. $this->destination;
    }
}
