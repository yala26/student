<?php

use yii\helpers\Html;
//$this->registerJsFile('web/js/student.js');
//$this->registerJsFile('web/js/custom.js');

?>
<p><?=$model?></p>

<!--<table class="table table-hover table-bordered" >-->
<!--    --><?php
//    foreach ($model as $row) {
//        ?>
<!--        <tr>-->
<!--            <td>--><?//= $row['teacher'] ?><!--</td>-->
<!--            <td>--><?//= $row['object'] ?><!--</td>-->
<!--            <td>--><?//= Html::a('sign up for a course', '#', ['class' => 'btn btn-success']) ?><!--</td>-->
<!--        </tr>-->
<!--    --><?// } ?>
<!--</table>-->
<div><?= Html::a('Logout ', '/audification/logout', ['class' => 'btn btn-primary']) ?>
</div>
