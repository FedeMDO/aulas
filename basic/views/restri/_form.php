<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restri-calendar-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $result = ArrayHelper::map($institutos, 'ID', 'NOMBRE');?>
     <?php
    $horas = ['08:00:00' => '08:00',
    '09:00:00' => '09:00',
    '10:00:00' => '10:00',
    '11:00:00' => '11:00',
    '12:00:00' => '12:00',
    '13:00:00' => '13:00',
    '14:00:00' => '14:00',
    '15:00:00' => '15:00',
    '16:00:00' => '16:00',
    '17:00:00' => '17:00',
    '18:00:00' => '18:00',
    '19:00:00' => '19:00',
    '20:00:00' => '20:00',
    '21:00:00' => '21:00',
    '22:00:00' => '22:00']; ?>

    <?= $form->field($model, 'ID_Instituto_Recibe')->dropDownList(
        $result,
        ['prompt' => 'SELECCIONE UN INSTITUTO...']
        ); ?>

    <?= $form->field($model, 'ID_Tipo_Repeticion')->textInput() ?>

    <?= $form->field($model, 'ID_User_Recibe')->dropDownList(
        $users,
        ['prompt' => 'SELECIONE UN USUARIO...']
        ); ?>

    <?php echo $form->field($model, 'Hora_ini')->dropDownList(
        $horas, 
        ['prompt'=>'SELECCIONE HORA DE INICIO...']
        ); ?> 

   <?php echo $form->field($model, 'Hora_fin')->dropDownList(
        $horas, 
        ['prompt'=>'SELECCIONE HORA DE fin...']
        ); ?> 

    <?= $form->field($model, 'ID_Ciclo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
