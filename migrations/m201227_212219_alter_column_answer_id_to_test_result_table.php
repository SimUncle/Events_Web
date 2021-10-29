<?php

use yii\db\Migration;

/**
 * Class m201227_212219_alter_column_answer_id_to_test_result_table
 */
class m201227_212219_alter_column_answer_id_to_test_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->alterColumn('test_result','answer_id', $this->integer()->null());
        $this->alterColumn('test_result','time', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->alterColumn('test_result','answer_id', $this->integer()->notNull());
        $this->alterColumn('test_result','time', $this->integer()->notNull());
    }
}
