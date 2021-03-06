<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

$this->title = 'Restaurar contraseña';
?>

<?php if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_ERROR)) :

        \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);

    endif; ?>

<?php if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)) :

        \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);

    endif; ?>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc log">
<h1>Restaurar contraseña</h1>
 <?= $form->field($model, "email", ['labelOptions' => ['style' => 'color:white']])->input("email")->label("Email") ?>  
 <?= $form->field($model, "password", ['labelOptions' => ['style' => 'color:white']])->input("password")->label("Contraseña nueva") ?>  
 <?= $form->field($model, "password_repeat", ['labelOptions' => ['style' => 'color:white']])->input("password")->label("Repita contraseña") ?>  
 <?= $form->field($model, "verification_code", ['labelOptions' => ['style' => 'color:white']])->input("text")->label("Ingrese codigo de verificacion") ?>  
 <?= $form->field($model, "recover", ['labelOptions' => ['style' => 'color:white']])->input("hidden")->label(false) ?>  
 <?= Html::submitButton("Recuperar contraseña", ["class" => "btn btn-success btn-block"]) ?>  
</div>
</div>
<?php $form->end() ?>