<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instituto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instituto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_INSTITUCION')->textInput() ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
