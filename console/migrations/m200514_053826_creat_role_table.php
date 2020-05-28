<?php

use yii\db\Migration;

/**
 * Class m200514_053826_creat_role_table
 */
class m200514_053826_creat_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'sn' => $this->string()->comment('sn'),
            'roleName' => $this->string()->comment('角色名称'),
            'roleDesc' => $this->string()->comment('角色描述'),
            'status' => $this->boolean()->comment('状态'),
            'createTime' => $this->dateTime(),
            'updateTime' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('role');
    }
}
