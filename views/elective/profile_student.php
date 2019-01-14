<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 01/14/2019
 * Time: 2:20 PM
 */
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

?>
<p><?=$model?></p>
<nav class="navbar navbar-default ">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">menu <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><?= Html::a('profile setting', '/elective/setting_st') ?></li>
                    <li><?= Html::a('schedule', '/courses/schedule') ?></li>
                    <li><?= Html::a('sign up for courses', '/courses/recording') ?></li>
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