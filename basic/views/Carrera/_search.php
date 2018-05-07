<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarreraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrera-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_CARRERA') ?>

    <?= $form->field($model, 'ID_INSTITUTO') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
