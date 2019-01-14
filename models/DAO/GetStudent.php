<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/14/2019
 * Time: 4:25 PM
 */

namespace app\models\DAO;

use app\models\Courses;
use app\models\Credential;
use app\models\StudentCourses;
use app\models\Students;
use app\models\Teachers;
use yii;


class GetStudent
{
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
}