<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dominus77\sweetalert2;

$this->title = 'Recuperar contraseña';

?>


<?php if(Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)):
  
  \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);

endif; ?>
<?php if(Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_ERROR)):
  
  \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);

endif; ?>


 

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc log">
<h1>Recuperar contraseña</h1>
<p>Por favor ingrese su email:</p>
 <?= $form->field($model, "email",['labelOptions'=>['style'=>'color:white']])->textinput() ?>

 <?= Html::submitButton("Recuperar contraseña", ["class" => "btn btn-success btn-block"]) ?>  
</div>
</div>
 

 
<?php $form->end() ?>