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

    <?= $form->field($model, 'NOMBRE',['labelOptions'=>['style'=>'color:white']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CALLEYNUM',['labelOptions'=>['style'=>'color:white']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCALIDAD',['labelOptions'=>['style'=>'color:white']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISPONIBLE_DESDE',['labelOptions'=>['style'=>'color:white']])->textInput() ?>

    <?= $form->field($model, 'DISPONIBLE_HASTA',['labelOptions'=>['style'=>'color:white']])->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
