<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Comision;
use app\models\Carrera;

/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class='loginc'>
<div class="evento-calendar-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'crear-evento-form'
                ]
            ]); 
    $carreras = Carrera::find()->asArray()->all();
    $resultCarr = ArrayHelper::map($carreras, 'ID', 'NOMBRE');
    ?>
    <?php echo $form->field($carrera, 'ID')->dropDownList(
        $resultCarr,
        ['prompt'=>'Seleccione Cerrera...',
            'onchange'=>'
				$.post( "'.Yii::$app->urlManager->createUrl('evento/listmateria?id=').'"+$(this).val(), function( data ) {
				  $( "select#materia-id" ).html( data );
				});
			'])->label('Carrera');  ?>

    <?php echo $form->field($materia, 'ID')->dropDownList(
        array(),
        ['prompt'=>'Seleccione Materia...',
            'onchange'=>'
				$.post( "'.Yii::$app->urlManager->createUrl('evento/listcomision?id=').'"+$(this).val(), function( data ) {
				  $( "select#eventocalendar-id_comision" ).html( data );
				});
			'])->label('Materia'); ?>

    <?php echo $form->field($model, 'ID_Comision')->dropDownList(
        array(), 
        ['prompt'=>'Seleccione comision...']
        )->label(' COMISION '); ?>

    <?php $diasdelasemana = ['1' => 'Lunes',
                            '2' => 'Martes',
                            '3' => 'Miercoles',
                            '4' => 'Jueves',
                            '5' => 'Viernes',
                            '6' => 'Sabado',
                            '7' => 'Domingo',
                        ];
    ?>
    <?php echo $form->field($model, 'dow')->dropDownList(
        $diasdelasemana, 
        ['prompt'=>'SELECCIONE EL DIA......']
        )->label('Dia');
        ?>
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
        )->label("Desde las"); ?> 

          <?php echo $form->field($model,'Hora_fin')->dropDownList(
        $horas, 
        ['prompt'=>'SELECCIONE LA HORA DE FIN.......']
        )->label("Hasta las"); ?> 
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
        <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
