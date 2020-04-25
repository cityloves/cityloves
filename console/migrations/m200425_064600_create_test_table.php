<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test`.
 */
class m200425_064600_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'mobile' => $this->string()->unique()->comment('手机号'),
            'password' => $this->string()->comment('密码'),
            'createTime' => $this->dateTime(),
            'updateTime' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test');
    }
}
