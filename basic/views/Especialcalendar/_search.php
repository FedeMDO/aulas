<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EspecialcalendarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="especial-calendar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ID_Aula') ?>

    <?= $form->field($model, 'dt_inicio') ?>

    <?= $form->field($model, 'dt_fin') ?>

    <?= $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'momento') ?>

    <?php // echo $form->field($model, 'ID_UCrea') ?>

    <?php // echo $form->field($model, 'ID_UModifica') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
