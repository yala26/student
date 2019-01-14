<?php
/**
 * Created by PhpStorm.
 * GetUser: Valera Yalov4uk
 * Date: 12/11/2018
 * Time: 6:24 PM
 */

namespace app\controllers;

use app\models\Form;
use app\models\NewUser;
use app\models\RegForm;
use Yii;

class AudificationController extends MainController
{
    public function actionIndex()
    {
        $model = new Form();
        if (yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->check()) {
                    $user = new NewUser();
                    $user->username = $model->login;
                    $user->password = $model->pass;
                    yii::$app->user->login($user, 3600 * 24);
                    if ($model->authorization($user->username)) {
                        return $this->redirect('/elective/profile_teacher'
                        );
                    } else {
                        return $this->redirect('/elective/profile_student'
                        );
                    }
                } else {
                    yii::$app->session->setFlash('error', 'wrong login or password');
                    return $this->render('index',
                        ['model' => $model]
                    );
                }
            } else {
                return $this->render('index',
                    ['model' => $model]
                );
            }
        } else {
            $username = yii::$app->user->identity;
            $name = [];
            foreach ($username as $row) {
                $name[] = $row;
            }
            if ($model->authorization($name[1])) {
                return $this->redirect('/elective/profile_teacher'
                );
            } else {
                return $this->redirect('/elective/profile_student'
                );
            }
        }
    }



    public function actionRegistration()
    {
        $model = new RegForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->reg()) {
                return $this->redirect('/audification/index'
                );
            } else {
                return $this->render('registration',
                    ['model' => $model]
                );
            }
        } else {
            return $this->render('registration',
                ['model' => $model]
            );
        }
    }

    public function actionLogout()
    {
        yii::$app->user->logout();
        return $this->redirect('/audification/index'
        );
    }

}