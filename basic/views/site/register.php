<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;
$this->title = 'Registro de usuario';
?>

<br>

<div class="col-md-offset-4 col-md-5">
<div class="loginc azul">
    
<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>

<h2 style="color:white; border-bottom: 1px solid white;">Registrar usuario</h2>
<?= $form->field($model, "username",['labelOptions'=>['style'=>'color:white; padding-top:10px']])->input("text")->label('Nombre de usuario') ?>   
<?= $form->field($model, "email",['labelOptions'=>['style'=>'color:white']])->input("email")->label('E-mail') ?>   
<!-- despliego institutos  -->
<?php $institutos = Instituto::find()->asArray()->all();
         $result = ArrayHelper::map($institutos, 'ID', 'NOMBRE'); ?>

 <?= $form->field($model, "idInstituto",['labelOptions'=>['style'=>'color:white']])->dropDownList(
            $result, 
<<<<<<< HEAD
            ['prompt'=>'Seleccione un instituto...']
    )->label('Instituto'); ?>
</div>

<?php $roles = ['Administrador', 'Usuario', 'Guest'];
 ?>
<div class="form-group">
 <?= $form->field($model, "rol")->dropDownList(
            $roles, 
            ['prompt'=>'Seleccione...']
    )->label('Permisos del usuario'); ?>
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password")->label('Contraseña') ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password")->label('Confirme la Contraseña') ?>   
</div>

<?= Html::submitButton("Finalizar Registro", ["class" => "btn btn-primary"]) ?>
=======
            ['prompt'=>'Seleccione un Instituto...']
    )->label('Instituto (dejar vacío si pertenece a CPE/CPyT)'); ?>
>>>>>>> 6d54c4cc39ba3bd6fbf6bec7dbd4e7714c4b1d3a

 <?= $form->field($model, "password",['labelOptions'=>['style'=>'color:white']])->input("password")->label('Contraseña') ?>   
 <?= $form->field($model, "password_repeat",['labelOptions'=>['style'=>'color:white']])->input("password")->label('Confirme la Contraseña') ?>   
<?= Html::submitButton("Finalizar Registro", ["class" => "btn btn-suces btn-success btn-block"]) ?>
<?php $form->end() ?>
</div>
</div>