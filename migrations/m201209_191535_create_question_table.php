<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 */
class m201209_191535_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'time' => $this->integer()->notNull()->defaultValue(0),
            'num' => $this->integer()->notNull()->defaultValue(0),
            'test_id' =>$this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%question}}');
    }
}
