<?php

use yii\db\Migration;

/**
 * Class m200514_101657_alter_admin_table_add_role_sn_columns
 */
class m200514_101657_alter_admin_table_add_role_sn_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('admin', 'roleSn', $this->string()->comment('角色sn'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('admin', 'roleSn');
    }
}
