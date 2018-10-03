<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Recuperar contraseña';
?>
 
 <div class="alert alert-success">
<p><?= Html::encode("{$msg} ") ?></p>
</div>
 

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>

<div class="loginc log">
<h1>Recuperar contraseña</h1>
<p>Por favor ingrese su email:</p>
 <?= $form->field($model, "email",['labelOptions'=>['style'=>'color:white']])->textinput() ?>

 <?= Html::submitButton("Recuperar contraseña", ["class" => "btn btn-success btn-block"]) ?>  
</div>
 

 
<?php $form->end() ?>