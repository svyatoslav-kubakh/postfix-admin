<?php
namespace console\migrations;

use yii\db\Migration;

class M180121204747Init extends Migration
{
    const TABLE_OPTION = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%mailer_domains}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
        ], self::TABLE_OPTION);
        $this->createTable('{{%mailer_users}}', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer()->notNull(),
            'email' => $this->string(120)->unique()->notNull(),
            'password' => $this->string(106)->notNull(),
            'meta' => $this->string(4000)->notNull(),
        ], self::TABLE_OPTION);
        $this->createTable('{{%mailer_aliases}}', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer()->notNull(),
            'source' => $this->string(100)->notNull(),
            'destination' => $this->string(100)->notNull(),
        ], self::TABLE_OPTION);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%mailer_domains}}');
        $this->dropTable('{{%mailer_users}}');
        $this->dropTable('{{%mailer_aliases}}');
    }
}
