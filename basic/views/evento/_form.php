<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Restri')->textInput() ?>

    <?= $form->field($model, 'ID_Comision')->textInput() ?>

    <?= $form->field($model, 'ID_Hora')->textInput() ?>

    <?= $form->field($model, 'ID_User_Asigna')->textInput() ?>

    <?= $form->field($model, 'ID_Dia')->textInput() ?>

    <?= $form->field($model, 'Fecha_ini')->textInput() ?>

    <?= $form->field($model, 'Fecha_fin')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
