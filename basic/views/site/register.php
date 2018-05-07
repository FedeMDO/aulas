<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3><?= $msg ?></h3>

<h1>Register</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "username")->input("text")->label('Nombre de usuario') ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "email")->input("email")->label('E-mail') ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password")->label('contraseña') ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password")->label('repita la contraseña') ?>   
</div>

<?= Html::submitButton("finalizar registro", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
