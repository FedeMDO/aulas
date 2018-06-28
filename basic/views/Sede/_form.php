<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Sede */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sede-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CALLEYNUM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCALIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISPONIBLE_DESDE')->textInput() ?>

    <?= $form->field($model, 'DISPONIBLE_HASTA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
