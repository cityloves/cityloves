<?php

use yii\db\Migration;

/**
 * Class m200428_024536_alter_admin_table_add_mobile_columns
 */
class m200428_024536_alter_admin_table_add_mobile_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('admin', 'mobile', $this->string()->unique()->comment('手机号'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('admin', 'mobile');
    }
}
