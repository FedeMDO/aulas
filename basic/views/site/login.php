<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Bienvenido';
$this->params['breadcrumbs'][] = $this->title;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
]);

?>

    
<div id="box_login">

<div class="loginc log">
    <h1><?= Html::encode($this->title) ?></h1>
  
    <p>Por favor complete los siguientes campos:</p>
  
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
    ]); ?>

       <?= $form->field($model, 'username', ['labelOptions'=>['style'=>'color:white'],'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>{input}</div>'
])->textInput()->label('') ?>
        <?= $form->field($model, 'password', ['labelOptions'=>['style'=>'color:white'],'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>{input}</div>'] )->passwordInput()->label('') ?>
        <a href="/site/recoverpass" style="color:red">¿Olvidaste tu contraseña?</a>
        <?= $form->field($model, 'rememberMe', ['labelOptions'=>['style'=>'color:white']] )->checkbox([
        ])->label('Recordar contraseña') ?>
        



        <div class="form-group">
            <div class="">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    

</div>

</div>


