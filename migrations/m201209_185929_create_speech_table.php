<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%speech}}`.
 */
class m201209_185929_create_speech_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%speech}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'speaker_id' => $this->integer()->notNull(),
            'sector_id' => $this->integer()->notNull(),
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
        $this->dropTable('{{%speech}}');
    }
}
