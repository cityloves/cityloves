<?php
namespace common\models;

use yii\db\ActiveRecord;

class Adv extends ActiveRecord
{
    public static function tableName()
    {
        return 'adv';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            ['link', 'string'],
            ['status', 'in', 'range' => [0, 1]]
        ];
    }
}