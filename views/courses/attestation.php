<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/09/2019
 * Time: 12:44 PM
 */

use app\DAO\GetProfile;
use yii\helpers\Html;


?>

<div><?= Html::a('menu', '/audification', ['class' => 'btn btn-primary']) ?>
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th>id</th>
        <th>your courses</th>
        <th>students</th>
        <th>value</th>
        <th>commit</th>
    </tr>
    </thead>
    <tbody>
    <?
    $students = new GetProfile();
    $i = 0;
    foreach ($model as $row) { ?>
        <?
        foreach ($students->getStudents($row['id']) as $row2) { ?>

            <tr>
                <td class="student_courses_id"><?=$student_courses_id[$i]?></td>
                <td><?= $row['course_name'] ?></td>
                <td><?= $row2['name'] ?></td>
                <td class="td"><?=$students->getValue($student_courses_id[$i])?></td>
                <td class="td2"><?=$students->getCommut($student_courses_id[$i])?></td>
            </tr>
            <?$i ++?>
        <? } ?>
    <? } ?>

    </tbody>
</table>
<!--<button style="margin-bottom:20px " id="save" class="btn btn-primary">save</button>-->
<div><?= Html::a('Logout ', '/audification/logout', ['class' => 'btn btn-primary']) ?>
</div>
