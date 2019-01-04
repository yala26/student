<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $pass
 * @property string $name
 */
class Users extends ActiveRecord
{

    public function rules()
    {
        return [
            [['login', 'pass', 'name'], 'required'],
            [['login', 'pass', 'name'], 'string', 'max' => 255],
        ];
    }

    public static function findByUsername($login)
    {
        return static::findOne([
            'login'=>$login
        ]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }



    public function validatePassword($password)
    {
        return yii::$app->security->validatePassword($password,$this->password_hash);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
//        return static::findOne(['access_token' => $token]);
        return null ;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}