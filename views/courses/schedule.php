<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/08/2019
 * Time: 4:55 PM
 */
use app\models\Teachers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\StudentCourses;
use app\DAO\GetProfile;

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
    $name = new GetProfile();
    foreach ($model as $row) {
        ?>
        <tr>
            <td><?= $name->getCourses($row['courses_id']) ?></td>
            <td><?= $name->getTeacher_name($row['courses_id']) ?></td>
            <td><?= $row['value'] ?></td>
            <td><?= $row['commit'] ?></td>
        </tr>
    <? } ?>
    </tbody>
</table>
<div ><?= Html::a('Logout ', '/audification/logout', ['class' => 'btn btn-primary']) ?>
</div>