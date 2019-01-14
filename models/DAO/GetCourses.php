<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/14/2019
 * Time: 4:41 PM
 */

namespace app\models\DAO;

use app\models\Courses;
use app\models\Credential;
use app\models\StudentCourses;
use app\models\Students;
use app\models\Teachers;
use yii;

class GetCourses
{
    public function getCourses_name($id)
    {
        $courses = Courses::find()->andWhere(['id' => $id])->one();
        return $courses['course_name'];
    }
}