<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 12/15/2018
 * Time: 12:47 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;

class RegForm extends Model
{
    public $login;
    public $pass;
    public $role;

    public function rules()
    {
        return [
            [['login', 'pass'], 'required'],
            [['role'], 'default', 'value' => '0'],
        ];
    }

    public function reg()
    {
        $users = Credential::find()->andWhere(['login' => $this->login])->all();
        $login = [];
        foreach ($users as $row) {
            $login['login'] = $row['login'];
        }
        if (empty($login['login'])) {
            $user = new Credential();
            $user->login = $this->login;
            $user->pass = yii::$app->security->generatePasswordHash($this->pass);
            $user->role = $this->role;
            if ($user->save()) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
}