<?php
/**
 * Created by PhpStorm.
 * User: Valera Yalov4uk
 * Date: 12/16/2018
 * Time: 3:00 PM
 */
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

?>
<!--<p>--><?//=$model?><!--</p>-->
<nav class="navbar navbar-default ">
    <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">menu <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><<?= Html::a('profile setting', '/elective/profile_st') ?></li>
                        <li><a href="#">Your profile</a></li>
                        <li><a href="#">sign up for a course</a></li>
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