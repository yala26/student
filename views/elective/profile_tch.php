<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/07/2019
 * Time: 6:20 PM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\DAO\GetProfile;

?>
<div ><?= Html::a('menu', '/audification', ['class' => 'btn btn-primary']) ?>
</div>
<?php $form = ActiveForm::begin(['action'=>'add_profile2']);?>
<?=$form->field($model,'name')->textInput(['value' => $name])?>
<?=$form->field($model,'email')->textInput(['value' => $email])?>
<div class="form-group">
    <?= html::submitButton('save',['class' => 'btn btn-primary'])?>
</div>

<?php ActiveForm::end();?>

<div ><?= Html::a('Logout ', '/audification/logout', ['class' => 'btn btn-primary']) ?>
</div>
