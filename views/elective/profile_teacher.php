<?php
/**
 * Created by PhpStorm.
 * GetUser: Valera Yalov4uk
 * Date: 01/14/2019
 * Time: 2:19 PM
 */

use yii\helpers\Html;

?>
<p><?=$model?></p>
<nav class="navbar navbar-default ">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">menu <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><?= Html::a('profile setting', '/elective/setting_tch') ?></li>
                    <li><?= Html::a('rate course', '/courses/attestation') ?></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!--<div >--><?//= Html::a('go ', '/elective/profile', ['class' => 'btn btn-primary']) ?>
<!--</div>-->
<div ><?= Html::a('Logout ', '/audification/logout', ['class' => 'btn btn-primary']) ?>
</div>
