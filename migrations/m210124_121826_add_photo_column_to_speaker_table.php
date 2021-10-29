<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%speaker}}`.
 */
class m210124_121826_add_photo_column_to_speaker_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('speaker', 'photo',$this->string(255)->null());
        $this->addColumn('speaker', 'profession',$this->string(255)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('speaker', 'photo');
        $this->dropColumn('speaker', 'profession');

    }
}
