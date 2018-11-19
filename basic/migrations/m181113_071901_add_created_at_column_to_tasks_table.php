<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `tasks`.
 */
class m181113_071901_add_created_at_column_to_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'created_at', $this->timestamp(14));
        $this->addColumn('task', 'updated_at', $this->timestamp(14));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'created_at');
        $this->dropColumn('task', 'updated_at');
    }
}
