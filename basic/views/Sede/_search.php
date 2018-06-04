<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SedeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sede-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_INSTITUCION') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'CALLEYNUM') ?>

    <?= $form->field($model, 'LOCALIDAD') ?>

    <?php // echo $form->field($model, 'DISPONIBLE_DESDE') ?>

    <?php // echo $form->field($model, 'DISPONIBLE_HASTA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
