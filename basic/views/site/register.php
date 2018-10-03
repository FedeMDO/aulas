<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;
$this->title = 'Registro de usuario';
?>

<br></br>

<div class="col-md-offset-4 col-md-5">
<div class="regis">
    
<h3><?= $msg ?></h3>

<h2>Registro Usuario</h2>
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
<!-- despliego institutos  -->
<?php $institutos = Instituto::find()->asArray()->all();
         $result = ArrayHelper::map($institutos, 'ID', 'NOMBRE'); ?>
<div class="form-group">
 <?= $form->field($model, "idInstituto")->dropDownList(
            $result, 
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

<?php $form->end() ?>
</div>

</div>