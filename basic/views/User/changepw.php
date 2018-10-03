<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $model app\models\FormChangePassword */
/* @var $form ActiveForm */
 
$this->title = 'Cambiar contraseña';
?>
<div class="col-md-offset-4 col-md-5">
<div class="user-changePassword ins loginc">
    
 
    <?php $form = ActiveForm::begin(); ?>
 
        <?= $form->field($model, 'current_password')->passwordInput()->label('Contraseña actual') ?>
        <?= $form->field($model, 'password')->passwordInput()->label('Nueva contraseña') ?>
        <?= $form->field($model, 'confirm_password')->passwordInput()->label('Confirmar contraseña') ?>
 
        <div class="form-group">
            <?= Html::submitButton('Confirmar', ['class' => 'btn btn btn-success btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>