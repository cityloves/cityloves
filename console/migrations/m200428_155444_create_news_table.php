<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m200428_155444_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('标题'),
            'body' => $this->text()->comment('内容'),
            'uri' => $this->string()->comment('图片'),
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
        $this->dropTable('news');
    }
}
