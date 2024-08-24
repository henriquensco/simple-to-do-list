<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_status}}`.
 */
class m240820_220506_create_task_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task_status}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task_status}}');
    }
}
