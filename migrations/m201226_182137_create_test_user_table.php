<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_user}}`.
 */
class m201226_182137_create_test_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test_user', [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date_start' => $this->integer()->notNull(),
            'date_end' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test_user');
    }
}
