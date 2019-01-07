<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property int $average_value
 * @property string $name
 * @property string $email
 * @property int $credential_id
 *
 * @property StudentCourses[] $studentCourses
 * @property Credential $credential
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'name', 'email', 'credential_id'], 'required'],
            [['average_value', 'credential_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            [['credential_id'], 'exist', 'skipOnError' => true, 'targetClass' => Credential::className(), 'targetAttribute' => ['credential_id' => 'id']],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'average_value' => 'Average Value',
            'name' => 'Name',
            'email' => 'Email',
            'credential_id' => 'Credential ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCourses()
    {
        return $this->hasMany(StudentCourses::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCredential()
    {
        return $this->hasOne(Credential::className(), ['id' => 'credential_id']);
    }
}
