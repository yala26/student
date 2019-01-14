<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/14/2019
 * Time: 4:38 PM
 */

namespace app\models\DAO;

use app\models\Courses;
use app\models\Credential;
use app\models\StudentCourses;
use app\models\Students;
use app\models\Teachers;
use yii;

class GetTeacher
{
    public function getTeacher_name_by_courses_id($id)
    {
        $courses = Courses::find()->andWhere(['id' => $id])->one();
        $teacher = Teachers::find()->andWhere(['id' => $courses['teachers_id']])->one();
        return $teacher['name'];
    }

}