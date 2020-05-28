<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role_auth}}`.
 */
class m200514_100032_create_role_auth_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role_auth}}', [
            'id' => $this->primaryKey(),
            'roleSn' => $this->string()->comment('角色sn'),
            'authSn' => $this->string()->comment('权限sn'),
            'authName' => $this->string()->comment('权限名称'),
            'status' => $this->boolean()->comment('状态 0冻结 1激活')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role_auth}}');
    }
}
