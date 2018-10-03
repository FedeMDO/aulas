<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
?>

 <h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>
<div class="col-md-offset-4 col-md-5">
<div class="loginc log">
<h1>Recuperar contraseña</h1>
 <?= $form->field($model, "email",['labelOptions'=>['style'=>'color:white']])->input("email")->label("E-mail:") ?>  
 <?= $form->field($model, "password",['labelOptions'=>['style'=>'color:white']])->input("password")->label("Contraseña nueva:") ?>  
 <?= $form->field($model, "password_repeat",['labelOptions'=>['style'=>'color:white']])->input("password")->label("Repita contraseña:") ?>  
 <?= $form->field($model, "verification_code",['labelOptions'=>['style'=>'color:white']])->input("text")->label("Ingrese codigo de verificacion:") ?>  
 <?= $form->field($model, "recover",['labelOptions'=>['style'=>'color:white']])->input("hidden")->label(false) ?>  
 <?= Html::submitButton("Recuperar contraseña", ["class" => "btn btn-success btn-block"]) ?>  
</div>
</div>
<?php $form->end() ?>