<?php
namespace backend\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "mailer_aliases".
 *
 * @property int $id
 * @property int $domain_id
 * @property string $source
 * @property string $destination
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_id', 'source', 'destination'], 'required'],
            [['domain_id'], 'integer'],
            [['source', 'destination'], 'string', 'max' => 100],
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
            'source' => 'Source',
            'destination' => 'Destination',
        ];
    }
}
