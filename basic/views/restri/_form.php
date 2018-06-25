<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restri-calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Aula')->textInput() ?>

    <?= $form->field($model, 'ID_Instituto_Recibe')->textInput() ?>

    <?= $form->field($model, 'ID_Tipo_Repeticion')->textInput() ?>

    <?= $form->field($model, 'ID_User_Recibe')->textInput() ?>

    <?= $form->field($model, 'Fecha_ini')->textInput() ?>

    <?= $form->field($model, 'Fecha_fin')->textInput() ?>

    <?= $form->field($model, 'Periodo_Academico')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
