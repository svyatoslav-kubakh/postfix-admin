<?php
namespace console\migrations;

use Yii;
use DateTime;
use yii\db\Migration;
use yii\base\Security;
use common\models\User as UserModel;
use console\migrations\M180121204747Init as InitMigration;

class M180121215558Users extends Migration
{
    const DEFAULT_USER_NAME = 'admin';

    const DEFAULT_USER_PASS = '123';

    /** @var string */
    protected $tableName;

    /** @var Security */
    protected $security;

    /** @var DateTime */
    protected $now;

    public function init()
    {
        parent::init();
        $this->security = Yii::$app->security;
        $this->now = new DateTime();
        $this->tableName = UserModel::tableName();
    }

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], InitMigration::TABLE_OPTION);
        $this->insert($this->tableName, [
            'username' => self::DEFAULT_USER_NAME,
            'password_hash' => $this->security->generatePasswordHash(self::DEFAULT_USER_PASS),
            'status' => UserModel::STATUS_ACTIVE,
            'auth_key' => $this->security->generateRandomString(),
            'created_at' => $this->now->getTimestamp(),
            'updated_at' => $this->now->getTimestamp(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
