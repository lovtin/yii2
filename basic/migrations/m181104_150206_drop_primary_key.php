<?php

use yii\db\Migration;

/**
 * Class m181104_150206_drop_primary_key
 */
class m181104_150206_drop_primary_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('x-users-login', 'users', 'username');
       // $this->dropIndex('x-users-login', 'users');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->addPrimaryKey('x-users-login', 'users');
        $this->createIndex('x-users-login', 'users', 'username');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181104_150206_drop_primary_key cannot be reverted.\n";

        return false;
    }
    */
}
