<?php

use yii\db\Migration;

/**
 * Class m200428_053933_alter_admin_table_add_idcard_columns
 */
class m200428_053933_alter_admin_table_add_idcard_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('admin', 'idcard', $this->string()->unique()->comment('身份证号码'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('admin', 'idcard');
    }
}
