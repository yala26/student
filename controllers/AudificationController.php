<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
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
                    return $this->render('prof',
                        ['model' => yii::$app->user->identity->username]
                    );
//                } else {
//                    return $this->render('index',
//                        ['model' => $model]
//                    );
//                }
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
            return $this->render('prof',
                ['model' => $name[3]]
            );
        }
    }

    public function actionRegistration()
    {
        $model = new RegForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->reg()) {
                return $this->render('prof',
                    ['model' => $model->name]
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

    public function actionTest()
    {
        return 'tkejnjtrnb';
    }

}