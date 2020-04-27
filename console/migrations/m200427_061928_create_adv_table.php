<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%adv}}`.
 */
class m200427_061928_create_adv_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%adv}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('名称'),
            'uri' => $this->string()->comment('图片地址'),
            'link' => $this->string()->comment('链接地址'),
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
        $this->dropTable('{{%adv}}');
    }
}
