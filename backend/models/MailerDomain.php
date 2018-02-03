<?php
namespace backend\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "mailer_domains".
 *
 * @property int $id
 * @property string $name
 */
class MailerDomain extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mailer_domains';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
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
