<?php

use yii\db\Migration;

/**
 * Class m181104_143949_rename_column_users_login
 */
class m181104_143949_rename_column_users_login extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('users', 'login', 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('users', 'username', 'login');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181104_143949_rename_column_users_login cannot be reverted.\n";

        return false;
    }
    */
}
