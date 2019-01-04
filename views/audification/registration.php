<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin();?>
<?=$form->field($model,'login')?>
<?=$form->field($model,'pass')?>
<?=$form->field($model,'name')?>
    <div class="form-group">
        <?= html::submitButton('registration',['class' => 'btn btn-primary'])?>
    </div>

<?php ActiveForm::end();?>