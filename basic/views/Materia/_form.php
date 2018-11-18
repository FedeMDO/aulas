<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */
/* @var $form yii\widgets\ActiveForm */
?>
<div class='materia-form'>

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'NOMBRE', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'DESC_CORTA', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true])->label("Descripcion corta")?>

    <?=$form->field($model, 'COD_MATERIA', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true])->label("Codigo de materia")?>

    <div class="form-group">
        <?=Html::submitButton('Crear', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>