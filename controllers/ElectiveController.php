<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/04/2019
 * Time: 3:02 PM
 */

namespace app\controllers;

use app\DAO\GetProfile;
use app\models\Courses;
use app\models\StudentCourses;
use app\models\StudentsForm;
use app\models\Teachers;
use app\models\TeachersForm;
use Yii;

class ElectiveController extends MainController
{
    public function actionProfile_st()
    {
        $student = new GetProfile();
        $model = new StudentsForm;
        return $this->render('profile_st',
            ['model' => $model,
                'name' => $student->getName(),
                'email' => $student->getEmail()]
        );
    }

    public function actionAdd_profile()
    {
        $model = new StudentsForm();
        $student = new GetProfile();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->change_profile()) {
                return $this->render('profile_st',
                    ['model' => $model,
                        'name' => $student->getName(),
                        'email' => $student->getEmail()]
                );
            } else {
                return 'fatal error';
            }
        } else {
            return 'fatal errorrrr';
        }
    }

    public function actionProfile_tch()
    {
        $teacher = new GetProfile();
        $model = new TeachersForm();
        return $this->render('profile_tch',
            ['model' => $model,
                'name' => $teacher->getName(),
                'email' => $teacher->getEmail()]
        );
    }

    public function actionAdd_profile2()
    {
        $model = new TeachersForm();
        $teacher = new GetProfile();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->change_profile()) {
                return $this->render('profile_tch',
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