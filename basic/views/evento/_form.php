<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Comision;
use app\models\Carrera;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class='loginc azul'>

<div class="evento-calendar-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => 'crear-evento-form'
        ]
    ]);
    $resultCarr = ArrayHelper::map($carreras, 'ID', 'NOMBRE');
    ?>
    <h1>Crear evento calendario </h1>
    <?php echo $form->field($carrera, 'ID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $resultCarr,
        [
            'prompt' => 'Seleccionar',
            'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('evento/listmateria?id=') . '"+$(this).val(), function( data ) {
                  if(data){
                    $( "select#materia-id" ).html( data );
                    $("select#materia-id").prop("selectedIndex", 0).change();
                  }
				});
            '
        ]
    )->label('Carrera'); ?>
            
    <?php echo $form->field($materia, 'ID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        array(),
        [
            'prompt' => 'Seleccionar',
            'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('evento/listcomision?id=') . '"+$(this).val(), function( data ) {
                  $( "select#eventocalendar-id_comision" ).html( data );
                  
                  
				});
			'
        ]
    )->label('Materia'); ?>

    <?php echo $form->field($model, 'ID_Comision', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        array(),
        ['prompt' => 'Seleccionar']
    )->label(' Comision '); ?>

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
    <?php echo $form->field($model, 'dow', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $diasdelasemana,
        ['prompt' => 'Seleccionar']
    )->label('Dia');
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
       <?php echo $form->field($model, 'Hora_ini', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $horas,
            ['prompt' => 'Seleccionar']
        )->label("Desde las"); ?> 

          <?php echo $form->field($model, 'Hora_fin', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
                $horas,
                ['prompt' => 'Seleccionar']
            )->label("Hasta las"); ?> 
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
        <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
