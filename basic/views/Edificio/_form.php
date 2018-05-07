<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Edificio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edificio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_SEDE')->textInput() ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CANTIDAD_AULAS')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
