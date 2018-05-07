<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_MATERIA')->textInput() ?>

    <?= $form->field($model, 'CARGA_HORARIA_SEMANAL')->textInput() ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
