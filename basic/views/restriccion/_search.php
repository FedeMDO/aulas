<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restri-calendar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_Aula') ?>

    <?= $form->field($model, 'ID_Instituto_Recibe') ?>

    <?= $form->field($model, 'ID_Tipo_Repeticion') ?>

    <?= $form->field($model, 'ID_User_Recibe') ?>

    <?php // echo $form->field($model, 'Fecha_ini') ?>

    <?php // echo $form->field($model, 'Hora_ini') ?>

    <?php // echo $form->field($model, 'Hora_fin') ?>

    <?php // echo $form->field($model, 'Periodo_Academico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
