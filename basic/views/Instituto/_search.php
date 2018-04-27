<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instituto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_INSTITUTO') ?>

    <?= $form->field($model, 'ID_INSTITUCION') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'DESCRIPCION') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
