<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/07/2019
 * Time: 5:48 PM
 */

namespace app\DAO;

use app\models\Courses;
use app\models\Credential;
use app\models\StudentCourses;
use app\models\Students;
use app\models\Teachers;
use yii;

class GetProfile
{
    private $name;
    private $email;

    public function getName()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $user = Credential::find()->andWhere(['login' => $login[1]])->one();
        $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
        $this->name = $name['name'];
        return $this->name;

    }

    public function getEmail()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $user = Credential::find()->andWhere(['login' => $login[1]])->one();
        $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
        $this->email = $name['email'];
        return $this->email;
    }

    public function Credential_courses($courses_id)
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $credential_id = Credential::find()->andWhere(['login' => $login[1]])->one();
        $student_id = Students::find()->andWhere(['credential_id' => $credential_id['id']])->one();
        $find = StudentCourses::find()->andWhere(['courses_id' => $courses_id])->
        andWhere(['student_id' => $student_id['id']])->one();
        if (empty($find)) {
            $student = new StudentCourses();
            $student->courses_id = $courses_id;
            $student->student_id = $student_id['id'];
            if ($student->save()) {
                return true;
            } else {
                return false;
            }
        }else{
            return true;
        }
    }

    public function getStudent_id()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $credential_id = Credential::find()->andWhere(['login' => $login[1]])->one();
        $student_id = Students::find()->andWhere(['credential_id' => $credential_id['id']])->one();
        return $student_id['id'];
    }

    public function getTeacher_name($id)
    {
        $courses = Courses::find()->andWhere(['id' => $id])->one();
        $teacher = Teachers::find()->andWhere(['id' => $courses['teachers_id']])->one();
        return $teacher['name'];
    }

    public function getCourses($id)
    {
        $courses = Courses::find()->andWhere($id)->one();
        return $courses['course_name'];
    }
}