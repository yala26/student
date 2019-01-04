<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div><?= Html::a('sign in', '/audification/index', ['class'=>'btn btn-primary']) ?>
    <?= Html::a('sign up', '/audification/registration', ['class'=>'btn btn-primary']) ?>
</div>

<?
if(yii::$app->session->hasFlash('error')){
    echo yii::$app->session->getFlash('error');
}
?>

<?php $form = ActiveForm::begin();?>
<?=$form->field($model,'login')?>
<?=$form->field($model,'pass')?>
    <div class="form-group">
        <?= html::submitButton('come in',['class' => 'btn btn-primary'])?>
    </div>

<?php ActiveForm::end();?>


