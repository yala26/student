<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_courses".
 *
 * @property int $id
 * @property int $student_id
 * @property int $courses_id
 * @property int $value
 * @property string $commit
 *
 * @property Students $student
 * @property Courses $courses
 */
class StudentCourses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'courses_id'], 'required'],
            [['student_id', 'courses_id', 'value'], 'integer'],
            [['commit'], 'string', 'max' => 255],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['courses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['courses_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'GetStudent ID',
            'courses_id' => 'Courses ID',
            'value' => 'Value',
            'commit' => 'Commit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasOne(Courses::className(), ['id' => 'courses_id']);
    }
}
