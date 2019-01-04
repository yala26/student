<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "mytable".
 *
 * @property int $id
 * @property string $tasks
 * @property string $data
 * @property int $users_id
 */
class Mytable extends ActiveRecord
{


//    public function rules()
//    {
//        return [
//            [['tasks', 'data', 'users_id'], 'required'],
//            [['users_id'], 'integer'],
//            [['tasks', 'data'], 'string', 'max' => 255],
//        ];
//    }


}
