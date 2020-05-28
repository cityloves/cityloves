<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth}}`.
 */
class m200514_060848_create_auth_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth}}', [
            'id' => $this->primaryKey(),
            'sn' => $this->string()->comment('编号'),
            'psn' => $this->string()->comment('父级sn'),
            'level' => $this->string()->defaultValue('1')->comment('等级'),
            'authName' => $this->string()->comment('权限名称'),
            'path' => $this->string()->comment('路径'),
            'type' => $this->string()->comment('类型 1菜单 2功能'),
            'authDesc' => $this->string()->comment('权限描述'),
            'status' => $this->boolean()->comment('状态 0冻结 1激活'),
            'orderCode' => $this->string()->comment('排序字段'),
            'createTime' => $this->dateTime()->comment('创建时间'),
            'updateTime' => $this->dateTime()->comment('更新时间')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auth}}');
    }
}
