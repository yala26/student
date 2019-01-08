<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/08/2019
 * Time: 4:45 PM
 */

namespace app\controllers;

use app\DAO\GetProfile;
use app\models\Courses;
use app\models\StudentCourses;
use Yii;

class CoursesController extends MainController
{
    public function actionRecording()
    {
        $model = Courses::find()->all();
        return $this->render('recording',
            ['model' => $model]
        );
    }

    public function actionRecording_courses()
    {
        $student = new GetProfile();
        $model = Courses::find()->all();
        $request = Yii::$app->request;
        $post = $request->post();
        $course = [];
        foreach ($post as $row) {
            $course = $row;
        }
        if ($student->Credential_courses($course['course_name'])) {
            return $this->render('recording',
                ['model' => $model]
            );
        } else {
            return $this->redirect('/elective/profile_st'
            );
        }
    }

    public function actionSchedule()
    {
        $student_id = new GetProfile();
        $student = new StudentCourses();
//        $courses = $student->courses->course_name;
//        $teachers = $student->courses->teachers->name;
//        $value = $student->value;
//        $commit = $student->commit;
        $model = StudentCourses::find()->andWhere(['student_id' => $student_id->getStudent_id()])->all();
        return $this->render('schedule',
            ['model' => $model]
        );
    }
}