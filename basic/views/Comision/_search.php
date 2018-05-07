<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComisionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comision-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_COMISION') ?>

    <?= $form->field($model, 'ID_MATERIA') ?>

    <?= $form->field($model, 'CARGA_HORARIA_SEMANAL') ?>

    <?= $form->field($model, 'DESCRIPCION') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
