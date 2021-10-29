<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%speech_attachment}}`.
 */
class m201209_190650_create_speech_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%speech_attachment}}', [
            'id' => $this->primaryKey(),
            'speech_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
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
        $this->dropTable('{{%speech_attachment}}');
    }
}
