<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaAsigHoras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-asig-horas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_HORA')->textInput() ?>

    <?= $form->field($model, 'ID_DIA')->textInput() ?>

    <?= $form->field($model, 'ID_AULA')->textInput() ?>

    <?= $form->field($model, 'ID_USER_ASIGNA')->textInput() ?>

    <?= $form->field($model, 'ID_USER_RECIBE')->textInput() ?>

    <?= $form->field($model, 'COMISION_ASIGNADA')->textInput() ?>

    <?= $form->field($model, 'PERIODO_LECTIVO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
