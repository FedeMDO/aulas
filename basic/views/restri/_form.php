<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;
use app\models\CicloLectivo;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class='loginc azul'>
<div class="evento-calendar-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => 'crear-evento-form'
        ]
    ]);

    $insitutos = Instituto::find()->asArray()->all();
    $resultInst = ArrayHelper::map($insitutos, 'ID', 'NOMBRE');
    $ciclos = CicloLectivo::find()->asArray()->all();
    $resultCiclos = ArrayHelper::map($ciclos, 'id', 'nombre');
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

    <h1>Crear restriccion</h1>

        <?php echo $form->field($model, 'ID_Instituto', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $resultInst,
            ['prompt' => 'Seleccionar']
        )->label('Instituto');
        ?>

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

       <?php echo $form->field($model, 'Hora_ini', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $horas,
            ['prompt' => 'Seleccionar']
        )->label("Desde las"); ?> 

          <?php echo $form->field($model, 'Hora_fin', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
                $horas,
                ['prompt' => 'Seleccionar']
            )->label("Hasta las"); ?> 

        <?php echo $form->field($model, 'ID_Ciclo', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $resultCiclos,
            ['prompt' => 'Seleccionar']
        )->label('Ciclo Lectivo');
        ?>

    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
        <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
