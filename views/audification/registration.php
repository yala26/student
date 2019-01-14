<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= Html::a('sign in', '/audification/index', ['class'=>'btn btn-primary']) ?>
<?php $form = ActiveForm::begin();?>
<?=$form->field($model,'login')?>
<?=$form->field($model,'pass')?>
<?=$form->field($model,'name')?>
<?=$form->field($model,'email')?>
<?=$form->field($model,'role')->checkbox(['label' => 'teacher'])?>
    <div class="form-group">
        <?= html::submitButton('registration',['class' => 'btn btn-primary'])?>
    </div>

<?php ActiveForm::end();?>