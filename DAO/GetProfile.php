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
        if ($user['role'] == 0) {
            $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
            $this->name = $name['name'];
        } else {
            $name = Teachers::find()->andWhere(['credential_id' => $user['id']])->one();
            $this->name = $name['name'];
        }
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
        if ($user['role'] == 0) {
            $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
            $this->email = $name['email'];
        } else {
            $name = Teachers::find()->andWhere(['credential_id' => $user['id']])->one();
            $this->email = $name['email'];
        }
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
        } else {
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
        if ($credential_id['role'] == 0) {
            $student_id = Students::find()->andWhere(['credential_id' => $credential_id['id']])->one();
            return $student_id['id'];
        } else {
            $teacher_id = Teachers::find()->andWhere(['credential_id' => $credential_id['id']])->one();
            return $teacher_id['id'];
        }
    }

    public function getTeacher_name($id)
    {
        $courses = Courses::find()->andWhere(['id' => $id])->one();
        $teacher = Teachers::find()->andWhere(['id' => $courses['teachers_id']])->one();
        return $teacher['name'];
    }

    public function getCourses($id)
    {
        $courses = Courses::find()->andWhere(['id' => $id])->one();
        return $courses['course_name'];
    }

    public function getStudents($id)
    {
        $student_id = StudentCourses::find()->andWhere(['courses_id' => $id])->all();
        $students = [];
        foreach ($student_id as $row) {
            $name = Students::find()->andWhere(['id' => $row['student_id']])->one();
            $students[] = $name;
        }
        return $students;
    }

    public function getStudent_courses_id($student_id, $courses_id)
    {
        $student_courses_id = [];
        foreach ($student_id as $row) {
            $student_courses_id[] = StudentCourses::find()->andWhere(['courses_id' => $courses_id])->
            andWhere(['student_id' => $row])->one();
        }
        $id = [];
        foreach ($student_courses_id as $row) {
            $id[] = $row['id'];
        }
        return $id;
    }

    public function getValue($id)
    {
        $result = StudentCourses::find()->andWhere(['id' => $id])->one();
        return $result['value'];
    }

    public function getCommut($id)
    {
        $result = StudentCourses::find()->andWhere(['id' => $id])->one();
        return $result['commit'];
    }

    public function Add_value()
    {
        return true;
    }
}