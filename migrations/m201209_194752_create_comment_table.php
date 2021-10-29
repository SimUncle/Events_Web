<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m201209_194752_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(1000)->notNull(),
            'score' => $this->smallInteger(1)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->smallInteger()->defaultValue(0),
            'object_id' => $this->integer()->notNull(),
            'date' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
