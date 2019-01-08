<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/08/2019
 * Time: 4:48 PM
 */

use app\models\Teachers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div ><?= Html::a('menu', '/audification', ['class' => 'btn btn-primary']) ?>
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th>courses</th>
        <th>teacher</th>
        <th>recording</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($model as $row) {
        print_r($row['course_name']);
        ?>

        <tr>
            <td><?= $row['course_name'] ?></td>
            <? $teacher = Teachers::find()->andWhere(['id' => $row['teachers_id']])->one();
            ?>
            <td><?= $teacher['name'] ?></td>
            <td><?php $form = ActiveForm::begin(['action'=>'recording_courses']); ?>
                <?= $form->field($row ,'course_name')->hiddenInput(['value' => $row['id']])->label(false) ?>
                <?= Html::submitButton('recording!', ['class' => 'btn btn-success']) ?>
                <? ActiveForm::end(); ?>
            </td>
        </tr>
    <? } ?>
    </tbody>
</table>
<div ><?= Html::a('Logout ', '/audification/logout', ['class' => 'btn btn-primary']) ?>
</div>



