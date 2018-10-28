<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Comision;

/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $result = ArrayHelper::map($comisiones, 'ID', 'NUMERO'); ?>
    <?php echo $form->field($model, 'ID_Comision')->dropDownList(
        $result, 
        ['prompt'=>'SELECCIONE LA COMISION...']
        )->label(' COMISION '); ?>
    <?= $form->field($model, 'ID_Aula') ?>
    <?= $form->field($model, 'ID_Ciclo') ?>
    <?= $form->field($model, 'dow') ?>
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
         '22:00:00' => '22:00'];
         ?>
       <?php echo $form->field($model, 'Hora_ini')->dropDownList(
        $horas, 
        ['prompt'=>'SELECCIONE LA HORA DE INICIO......']
        ); ?> 

          <?php echo $form->field($model,'Hora_fin')->dropDownList(
                $horas, 
        ['prompt'=>'SELECCIONE LA HORA DE FIN.......']
        ); ?> 
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
