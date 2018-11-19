<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181029_174024_create_users_table extends Migration
{
    protected $tableName = 'users';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string(255)->notNull()
        ]);

        $this->createIndex("ix_users_login", $this->tableName, "login", true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
