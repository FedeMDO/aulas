<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Comision;
use app\models\Carrera;
use app\models\Users;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\EspecialCalendar */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="evento-calendar-form">
    <div class='loginc azul'>
        <?php $modelHelper = new \yii\base\DynamicModel(['fecha_inicio',  'hora_inicio', 'hora_fin']);
        $modelHelper->addRule(['fecha_inicio', 'hora_inicio', 'hora_fin'], 'required', null);
        $form = ActiveForm::begin([
            'options' => [
                'id' => 'crear-evento-form'
            ]
        ]);
        $resultCarr = ArrayHelper::map($carreras, 'ID', 'NOMBRE');
        ?>
        <h1>Crear evento calendario </h1>

        <?= $form->field($model, 'nombre', ['labelOptions' => ['style' => 'color:white']])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'EXAMEN_FINAL', ['options' =>['tag' => 'div','class' => 'checkbox icheck', 'style' => 'padding-bottom:10px']])->checkbox(['label' => 'Es examen final']); ?>
        <?= $form->field($model, 'descripcion', ['labelOptions' => ['style' => 'color:white']])->textInput(['maxlength' => true]) ?>

        <?php echo $form->field($model, 'ID_Carrera', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $resultCarr,
            [
                'prompt' => 'Seleccionar'
            ]
        )->label('Carrera'); ?>


        <?php $diasdelasemana = [
            '1' => 'Lunes',
            '2' => 'Martes',
            '3' => 'Miercoles',
            '4' => 'Jueves',
            '5' => 'Viernes',
            '6' => 'Sabado',
            '7' => 'Domingo',
        ];
        ?>
        <?php
        $horas = [
            '08:00:00' => '08:00',
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
            '22:00:00' => '22:00'
        ];
        ?>
        <?= $form->field($modelHelper, 'fecha_inicio', ['labelOptions' => ['style' => 'color:white']])->widget(\yii\jui\DatePicker::class, [
            'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['autocomplete' => 'off', 'readOnly' => true]
        ])->label("Fecha"); ?>
        <?php echo $form->field($modelHelper, 'hora_inicio', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $horas,
            ['prompt' => 'Seleccionar']
        )->label("Desde las"); ?>

        <?php echo $form->field($modelHelper, 'hora_fin', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $horas,
            ['prompt' => 'Seleccionar']
        )->label("Hasta las"); ?>

        <div class="form-group">
            <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>