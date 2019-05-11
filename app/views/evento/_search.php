<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-calendar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_Restri') ?>

    <?= $form->field($model, 'ID_Comision') ?>

    <?= $form->field($model, 'ID_Hora') ?>

    <?= $form->field($model, 'ID_User_Asigna') ?>

    <?php // echo $form->field($model, 'ID_Dia') ?>

    <?php // echo $form->field($model, 'Fecha_ini') ?>

    <?php // echo $form->field($model, 'Fecha_fin') ?>

    <?php // echo $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
