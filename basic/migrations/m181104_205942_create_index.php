<?php

use yii\db\Migration;

/**
 * Class m181104_205942_create_index
 */
class m181104_205942_create_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('x-users-username', 'users', 'username', 'true');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('x-users-username', 'users', 'username');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181104_205942_create_index cannot be reverted.\n";

        return false;
    }
    */
}
