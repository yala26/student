<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/14/2019
 * Time: 4:31 PM
 */

namespace app\models\DAO;

use app\models\Courses;
use app\models\Credential;
use app\models\StudentCourses;
use app\models\Students;
use app\models\Teachers;
use yii;

class GetStudentCourses
{
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

    public function getValue_by_id($id)
    {
        $result = StudentCourses::find()->andWhere(['id' => $id])->one();
        return $result['value'];
    }

    public function getCommit_by_id($id)
    {
        $result = StudentCourses::find()->andWhere(['id' => $id])->one();
        return $result['commit'];
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
}