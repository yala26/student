<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/14/2019
 * Time: 3:41 PM
 */

namespace app\models\DAO;

use app\models\Courses;
use app\models\Credential;
use app\models\StudentCourses;
use app\models\Students;
use app\models\Teachers;
use yii;

class GetUser
{
    public function getName()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $user = Credential::find()->andWhere(['login' => $login[1]])->one();
        if ($user['role'] == 0) {
            $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
            $name_student = $name['name'];
            return $name_student;
        } else {
            $name = Teachers::find()->andWhere(['credential_id' => $user['id']])->one();
            $name_teacher = $name['name'];
            return $name_teacher;
        }
    }

    public function getEmail()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $user = Credential::find()->andWhere(['login' => $login[1]])->one();
        if ($user['role'] == 0) {
            $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
            $email_student = $name['email'];
            return $email_student;
        } else {
            $name = Teachers::find()->andWhere(['credential_id' => $user['id']])->one();
            $email_teacher = $name['email'];
            return $email_teacher;
        }
    }

    public function getUser_id()
    {

        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $credential_id = Credential::find()->andWhere(['login' => $login[1]])->one();
        if ($credential_id['role'] == 0) {
            $student_id = Students::find()->andWhere(['credential_id' => $credential_id['id']])->one();
            return $student_id['id'];
        } else {
            $teacher_id = Teachers::find()->andWhere(['credential_id' => $credential_id['id']])->one();
            return $teacher_id['id'];
        }
    }
}