<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/04/2019
 * Time: 3:02 PM
 */

namespace app\controllers;

use app\DAO\GetProfile;
use app\models\StudentsForm;
use Yii;

class ElectiveController extends MainController
{
    public function actionProfile_st()
    {
        $student = new GetProfile();
        $model = new StudentsForm;
        return $this->render('profile_st',
            ['model' => $model,
                'name'=> $student->getName(),
                'email'=>$student->getEmail()]
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
                        'name'=> $student->getName(),
                        'email'=>$student->getEmail()]
                );
            } else {
                return 'fatal error';
            }
        } else {
            return 'fatal errorrrr';
        }
    }
}