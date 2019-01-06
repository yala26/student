<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 12/11/2018
 * Time: 8:11 PM
 */

namespace app\models;

use app\models\Credential;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use Yii;

class NewUser extends ActiveRecord implements IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public static function tableName()
    {
        return 'credential';
    }

    public function setPass($password)
    {
         yii::$app->security->generatePasswordHash($password);
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

    public function generateAuthKey()
    {
        return null;
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
        $user = new Form();
        if ($user ->load(Yii::$app->request->post()) && $user ->validate()){
            $users = Credential::find()->andWhere(['login' => $user->login])->one();
            $this->id = $users->id;
        }
        return $this->id;
    }


    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

}