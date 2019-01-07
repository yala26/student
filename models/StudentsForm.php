<?php


namespace app\models;
use yii;
use yii\base\Model;

class StudentsForm extends Model
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
        $student = Students::find()->andWhere(['credential_id' => $user['id']])->one();
        if (empty($student)){
            $add = new Students();
            $add->name = $this->name;
            $add->email = $this->email;
            $add->credential_id = $user['id'];
            if ($add->save()) {
                return true;
            } else {
                return false;
            }
        }else{
            $student->name = $this->name;
            $student->email = $this->email;
            if ($student->save()) {
                return true;
            } else {
                return false;
            }
        }
    }
}