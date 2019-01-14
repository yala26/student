<?php
/**
 * Created by PhpStorm.
 * GetUser: Valera Yalov4uk
 * Date: 12/15/2018
 * Time: 12:47 PM
 */

namespace app\models;

use app\DAO\GetUser;
use Yii;
use yii\base\Model;

class RegForm extends Model
{
    public $login;
    public $pass;
    public $role;
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['login', 'pass','name','email'], 'required'],
            [['role'], 'default', 'value' => '0'],
        ];
    }

    public function reg()
    {
        $users = Credential::find()->andWhere(['login' => $this->login])->one();
        if (empty($users['login'])) {
            $user = new Credential();
            $user->login = $this->login;
            $user->pass = yii::$app->security->generatePasswordHash($this->pass);
            $user->role = $this->role;
            if ($user->save()) {
                $client = Credential::find()->andWhere(['login' => $this->login])->one();
                if($this->role == 0){
                    $student = new Students();
                    $student->credential_id = $client['id'];
                    $student->name = $this->name;
                    $student->email = $this->email;
                    if($student->save()){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    $teacher = new Teachers();
                    $teacher->credential_id = $client['id'];
                    $teacher->name = $this->name;
                    $teacher->email = $this->email;
                    if($teacher->save()){
                        return true;
                    }else{
                        return false;
                    }
                }
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
}