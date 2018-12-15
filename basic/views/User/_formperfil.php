<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($usuario->profile_picture == ""): ?>
    <img src="../image/admin_icon.png" id=#avatar height=200px; width=200px; alt="Avatar" style="margin-bottom:20px; border-radius: 50%" >
    <?php else : ?>
    <img src=<?php echo $usuario->profile_picture ?> height=200px;  alt="Avatar" style="margin-bottom:20px; border-radius: 50%"> 
    <?php endif ?>
        <p style="text-align:left">Cambiar foto de perfil:</p>
        <?= $form->field($model1, "file")->fileInput()->label("") ?>
        <div class="form-group">
    <?= $form->field($model, 'username', ['labelOptions' => ['style' => 'color:white']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email', ['labelOptions' => ['style' => 'color:white']])->textInput() ?>

  
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>