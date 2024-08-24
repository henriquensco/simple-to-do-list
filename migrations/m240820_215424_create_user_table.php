<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m240820_215424_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
