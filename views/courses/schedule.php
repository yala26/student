<?php
/**
 * Created by PhpStorm.
 * GetUser: Valera Yalov4uk
 * Date: 01/08/2019
 * Time: 4:55 PM
 */

use app\models\DAO\GetCourses;
use app\models\DAO\GetUser;
use app\models\Teachers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\StudentCourses;
use app\models\DAO\GetTeacher;

?>
<div ><?= Html::a('menu', '/audification', ['class' => 'btn btn-primary']) ?>
</div>

<table class="table table-hover">
    <thead>
    <tr>
        <th>courses</th>
        <th>teacher</th>
        <th>value</th>
        <th>commit</th>
    </tr>
    </thead>
    <tbody>
    <?
    $courses_name = new GetCourses();
    $teacher_name = new GetTeacher();
    foreach ($model as $row) {
        ?>
        <tr>
            <td><?= $courses_name->getCourses_name($row['courses_id']) ?></td>
            <td><?=  $teacher_name->getTeacher_name_by_courses_id($row['courses_id']) ?></td>
            <td><?= $row['value'] ?></td>
            <td><?= $row['commit'] ?></td>
        </tr>
    <? } ?>
    </tbody>
</table>
<div ><?= Html::a('Logout ', '/audification/logout', ['class' => 'btn btn-primary']) ?>
</div>