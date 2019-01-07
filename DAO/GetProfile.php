<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/07/2019
 * Time: 5:48 PM
 */

namespace app\DAO;

use app\models\Credential;
use app\models\Students;
use yii;

class GetProfile
{
    private $name;
    private $email;

    public function getName()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $user = Credential::find()->andWhere(['login' => $login[1]])->one();
        $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
        $this->name = $name['name'];
        return $this->name;

    }

    public function getEmail()
    {
        $username = yii::$app->user->identity;
        $login = [];
        foreach ($username as $row) {
            $login[] = $row;
        }
        $user = Credential::find()->andWhere(['login' => $login[1]])->one();
        $name = Students::find()->andWhere(['credential_id' => $user['id']])->one();
        $this->email = $name['email'];
        return $this->email;
    }
}