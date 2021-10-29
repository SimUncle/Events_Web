<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m201212_180121_add_fio_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'fio',$this->string(255)->notNull()->after('username'));
        $this->addColumn('user', 'organization_id',$this->integer()->notNull()->after('fio'));
        $this->alterColumn('user', 'email',$this->string()->null()->unique());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'fio');
        $this->dropColumn('user', 'organization_id');
        $this->alterColumn('user', 'email',$this->string()->notNull()->unique());
    }
}
