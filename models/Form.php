<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 12/05/2018
 * Time: 4:46 PM
 */

namespace app\models;
use yii;
use yii\base\Model;

class Form extends Model
{
    public $login;
    public $pass;

    public function rules()
    {
        return [
            [['login', 'pass'], 'required'],
        ];
    }

//    public function fff()
//    {
//        if(!in_array($this->login, ['USA', 'Indonesia'])) {
//            $this->addError($this->login, 'error');
//        }
//    }



    public function check()
    {
        $users = Users::find()->andWhere(['login' => $this->login])->all();
        $login = [];
        foreach ($users as $row) {
            $login['login'] = $row['login'];
            $login['pass'] = $row['pass'];
        }
        if (empty(!$login['login'])) {
            if (Yii::$app->getSecurity()->validatePassword($this->pass, $login['pass'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

