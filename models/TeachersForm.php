<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/07/2019
 * Time: 6:20 PM
 */

namespace app\models;
use yii;
use yii\base\Model;

class TeachersForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [[ 'name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }

    public function change_profile()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $user = Credential::find()->andWhere(['login' => $login[1]])->one();
        $teacher = Teachers::find()->andWhere(['credential_id' => $user['id']])->one();
        if (empty($teacher)){
            $add = new Teachers();
            $add->name = $this->name;
            $add->email = $this->email;
            $add->credential_id = $user['id'];
            if ($add->save()) {
                return true;
            } else {
                return false;
            }
        }else{
            $teacher->name = $this->name;
            $teacher->email = $this->email;
            if ($teacher->save()) {
                return true;
            } else {
                return false;
            }
        }
    }
}