<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;
use dominus77\sweetalert2\Alert;
use app\assets\RegisterAsset;

$this->title = 'Registro de usuario';
RegisterAsset::register($this);
?>

<br>

<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
    
<?php if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS) || Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_ERROR)) :

    \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);

endif; ?>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'id' => 'formulario',
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]);
?>

<h2 style="color:white; border-bottom: 1px solid white;">Registrar usuario</h2>
<?= $form->field($model, "username", ['labelOptions' => ['style' => 'color:white; padding-top:10px']])->input("text")->label('Nombre de usuario') ?>   
<?= $form->field($model, "email", ['labelOptions' => ['style' => 'color:white']])->input("email")->label('Email') ?>   
<!-- despliego institutos  -->
<?php $institutos = Instituto::find()->asArray()->all();
$result = ArrayHelper::map($institutos, 'ID', 'NOMBRE'); ?>

 <?= $form->field($model, "idInstituto", ['labelOptions' => ['style' => 'color:white']])->dropDownList(
    $result,
    ['prompt' => 'Seleccione un instituto...']
)->label("Seleccione instituto"); ?>

<div class="testing">
<?= Html::checkbox('checkbox-id', false, ['label' => 'Sin instituto', 'id' => 'checkNoInstituto']) ?>
</div>

<?php $roles = ['Administrador', 'Usuario', 'Guest']; ?>
<br><p>
 <?= $form->field($model, "rol", ['labelOptions' => ['style' => 'color:white; margin-top:5px;']])->dropDownList(
    $roles
)->label('Permisos del usuario'); ?>
</p>
 <?= $form->field($model, "password", ['labelOptions' => ['style' => 'color:white']])->input("password")->label('Contraseña') ?>   
 <?= $form->field($model, "password_repeat", ['labelOptions' => ['style' => 'color:white']])->input("password")->label('Confirme la Contraseña') ?>   
<?= Html::submitButton("Finalizar registro", ["class" => "btn btn-suces btn-success btn-block"]) ?>
<?php $form->end() ?>
</div>
</div>