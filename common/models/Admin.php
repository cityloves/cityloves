<?php
namespace common\models;

use yii\db\ActiveRecord;
use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

class Admin extends ActiveRecord implements IdentityInterface
{
    public function rules()
    {
        return [
            ['username', 'unique', 'message' => '该用户名已经存在,请更换一个'],
            ['passwordHash', 'required'],
            ['passwordHash', 'setPassword'],
            ['status', 'in', 'range' => [0, 1]]
        ];
    }
    
    public static function tableName()
    {
        return 'admin';
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'passwordHash' => '密码'
        ];
    }

    public static function initNew($username, $password)
    {
        $admin = new self();
        $admin->username = $username;
        $admin->setPassword($password);

        return $admin;
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function setPassword($password)
    {
        $this->passwordHash = Yii::$app->security->generatePasswordHash($password);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passwordHash);
    }
    
}
