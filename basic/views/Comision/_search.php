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

    <?= $form->field($model, 'ID') ?>
<<<<<<< HEAD
=======

    <?= $form->field($model, 'NOMBRE') ?>
>>>>>>> 80578c2026d5725131e792c5a82248ddfc759278

    <?= $form->field($model, 'ID_MATERIA') ?>

    <?= $form->field($model, 'CARGA_HORARIA_SEMANAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
