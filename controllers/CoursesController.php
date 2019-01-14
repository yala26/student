<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/08/2019
 * Time: 4:45 PM
 */

namespace app\controllers;

use app\models\DAO\GetStudentCourses;
use app\models\DAO\GetStudent;
use app\models\DAO\GetUser;
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
        $student = new GetStudentCourses();
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
            return $this->redirect('/elective/setting_st'
            );
        }
    }

    public function actionSchedule()
    {
        $student_id = new GetUser();
        $model = StudentCourses::find()->andWhere(['student_id' => $student_id->getUser_id()])->all();
        return $this->render('schedule',
            ['model' => $model]
        );
    }

    public function actionAttestation()
    {
        $teacher_id = new GetUser();
        $student_courses_id = new GetStudentCourses();
        $model = Courses::find()->andWhere(['teachers_id' => $teacher_id->getUser_id()])->all();
        $students = new GetStudent();
        $courses_id =[];
        $student_id = [];
        foreach ($model as $row){
            $courses_id[] = $row['id'];
            foreach ($students->getStudents($row['id']) as $row2) {
                $student_id[] = $row2['id'];
            }
        }
        $student_courses_id->getStudent_courses_id($student_id,$courses_id);
        return $this->render('attestation',
            ['student_courses_id' =>  $student_courses_id->getStudent_courses_id($student_id,$courses_id),
                'model' => $model]
        );
    }

    public function actionUpdate_value()
    {
        $student_courses = StudentCourses::find()->andWhere(['id' => $_POST['id']])->one();
        $student_courses->value = $_POST['value'];
        $student_courses->save();
    }

    public function actionUpdate_commit()
    {
        $student_courses = StudentCourses::find()->andWhere(['id' => $_POST['id']])->one();
        $student_courses->commit = $_POST['commit'];
        $student_courses->save();
    }

}