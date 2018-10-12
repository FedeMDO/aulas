<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $model app\models\FormChangePassword */
/* @var $form ActiveForm */
 
$this->title = 'Cambiar contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-offset-4 col-md-4">
<div class="user-changePassword ins loginc azul">
    <?php $form = ActiveForm::begin(); ?>
    <h1 style="color:white; border-bottom: 1px solid white;">Cambiar contraseña</h1>
        <?= $form->field($model, 'current_password', ['labelOptions'=>['style'=>'color:white']])->passwordInput()->label('Contraseña actual') ?>
        <?= $form->field($model, 'password', ['labelOptions'=>['style'=>'color:white']])->passwordInput()->label('Nueva contraseña') ?>
        <?= $form->field($model, 'confirm_password', ['labelOptions'=>['style'=>'color:white']])->passwordInput()->label('Confirmar contraseña') ?>
 
        <div class="form-group">
            <?= Html::submitButton('Confirmar', ['class' => 'btn btn btn-success btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>