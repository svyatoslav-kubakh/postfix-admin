<?php

namespace console\migrations;

use yii\db\Migration;

/**
 * Class M180204190759Logs
 */
class M180204190759Logs extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%logs}}', [
            'id' => $this->primaryKey(),
            'user' => $this->string()->notNull(),
            'user_ip' => $this->integer()->unsigned()->notNull(),
            'item_type' => $this->integer()->unsigned()->notNull(),
            'item_id' => $this->integer()->unsigned()->notNull(),
            'action' => $this->tinyInteger()->unsigned()->notNull(),
            'old_data' => $this->text(),
            'new_data' => $this->text(),
            'log_date' => $this->integer()->unsigned()->notNull(),
        ]);
        $this->createIndex('idx_key_log_user', '{{%logs}}', ['user']);
        $this->createIndex('idx_key_log_action', '{{%logs}}', ['action']);
        $this->createIndex('idx_key_log_item', '{{%logs}}', ['item_type', 'item_id']);
        $this->createIndex('idx_key_log_date', '{{%logs}}', ['log_date']);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%logs}}');
    }
}
