<?php

namespace common\models;

use yii\db\ActiveRecord;

class Role extends ActiveRecord
{
    public static function tableName()
    {
        return 'role';
    }

    public function rules()
    {
        return [
            [['sn', 'roleName', 'roleDesc', 'status'], 'required']
        ];
    }
}
