<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m181106_165604_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'description' => $this->text(),
            'user_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_task_users', 'task', 'user_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }
}
