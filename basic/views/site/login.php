<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Ingresar';
//$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],

]);

?>

<div class="loginc log">
    <h1><?= Html::encode('Bienvenido') ?></h1>
  
    <p>Por favor complete los siguientes campos:</p>
  
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'enableAjaxValidation' => true
    ]); ?>

       <?= $form->field($model, 'username', ['labelOptions' => ['style' => 'color:white'], 'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>{input}</div>'])->textInput()->label('') ?>
        <?= $form->field($model, 'password', ['labelOptions' => ['style' => 'color:white'], 'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>{input}</div>'])->passwordInput()->label('') ?>
        <a href="/site/recoverpass" style="color:white">¿Olvidaste tu contraseña?</a>
        <?= $form->field($model, 'rememberMe', ['labelOptions' => ['style' => 'color:white']])->checkbox([])->label('Recordarme') ?>
        <div class="form-group">
            <div class="">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    

</div>
</div>


