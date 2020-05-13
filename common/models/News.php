<?php
namespace common\models;

use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => '标题',
            'body' => '内容',
            'status' => '状态'
        ];
    }
}
