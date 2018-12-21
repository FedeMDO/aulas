<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */
/* @var $form yii\widgets\ActiveForm */
?>
<style>



.box1{
    display:flex;
    justify-content:center;
    margin-left:50px;
}


</style>
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($usuario->profile_picture == ""): ?>
    <img src="../image/admin_icon.png" id=#avatar  alt="Avatar" style="margin-bottom:20px; border-radius: 50%; ">
    <?php else : ?>
    <img src=<?php echo $usuario->profile_picture ?>   alt="Avatar" style="margin-bottom:20px; border-radius: 50%; width: 200px; height:200px; border: 5px solid lavender; "> 
    <?php endif ?>
        <div class = "box1">
            <?= $form->field($model1, "file")->fileInput()->label("") ?>
        </div>

        <div class="form-group">
    <?= $form->field($model, 'username', ['labelOptions' => ['style' => 'color:white']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email', ['labelOptions' => ['style' => 'color:white']])->textInput() ?>

  
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>