<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-asig-horas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_HORA') ?>

    <?= $form->field($model, 'ID_DIA') ?>

    <?= $form->field($model, 'ID_AULA') ?>

    <?= $form->field($model, 'ID_USER_ASIGNA') ?>

    <?php // echo $form->field($model, 'ID_USER_RECIBE') ?>

    <?php // echo $form->field($model, 'COMISION_ASIGNADA') ?>

    <?php // echo $form->field($model, 'PERIODO_LECTIVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
