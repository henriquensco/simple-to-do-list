<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m240820_220529_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'priority' => $this->integer(),
            'status_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'expiration_date' => $this->date(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->createIndex(
            'idx-task-status_id',
            'task',
            'status_id'
        );

        $this->addForeignKey(
            'fk-task-status_id',
            'task',
            'status_id',
            'task_status',
            'id'
        );

        $this->createIndex(
            'idx-task-user_id',
            'task',
            'user_id'
        );

        $this->addForeignKey(
            'fk-task-user_id',
            'task',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
