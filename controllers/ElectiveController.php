<?php
/**
 * Created by PhpStorm.
 * GetUser: Valera Yalov4uk
 * Date: 01/04/2019
 * Time: 3:02 PM
 */

namespace app\controllers;

use app\models\DAO\GetUser;
use app\models\Courses;
use app\models\StudentCourses;
use app\models\StudentsForm;
use app\models\Teachers;
use app\models\TeachersForm;
use Yii;

class ElectiveController extends MainController
{

    public function actionProfile_teacher()
    {
        return $this->render('profile_teacher',
            ['model' => 'hello teacher']
        );
    }

    public function actionProfile_student()
    {
        return $this->render('profile_student',
            ['model' => 'hello student']
        );
    }

    public function actionSetting_st()
    {
        $student = new GetUser();
        $model = new StudentsForm;
        return $this->render('setting_st',
            ['model' => $model,
                'name' => $student->getName(),
                'email' => $student->getEmail()]
        );
    }

    public function actionAdd_setting_st()
    {
        $model = new StudentsForm();
        $student = new GetUser();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->change_profile()) {
                return $this->render('setting_st',
                    ['model' => $model,
                        'name' => $student->getName(),
                        'email' => $student->getEmail()]
                );
            } else {
                return 'fatal error';
            }
        } else {
            return 'fatal error';
        }
    }

    public function actionSetting_tch()
    {
        $teacher = new GetUser();
        $model = new TeachersForm();
        return $this->render('setting_tch',
            ['model' => $model,
                'name' => $teacher->getName(),
                'email' => $teacher->getEmail()]
        );
    }

    public function actionAdd_setting_tch()
    {
        $model = new TeachersForm();
        $teacher = new GetUser();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->change_profile()) {
                return $this->render('setting_tch',
                    ['model' => $model,
                        'name' => $teacher->getName(),
                        'email' => $teacher->getEmail()]
                );
            } else {
                return 'fatal error';
            }
        } else {
            return 'fatal errorrrr';
        }
    }

}