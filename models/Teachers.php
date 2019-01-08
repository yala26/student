<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $credential_id
 *
 * @property Courses[] $courses
 * @property Credential $credential
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'credential_id'], 'required'],
            [['credential_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            [['credential_id'], 'exist', 'skipOnError' => true, 'targetClass' => Credential::className(), 'targetAttribute' => ['credential_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'credential_id' => 'Credential ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['teachers_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCredential()
    {
        return $this->hasOne(Credential::className(), ['id' => 'credential_id']);
    }
}
