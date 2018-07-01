<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Comision;
use app\models\Hora;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restri-calendar-form">

    <?php $form = ActiveForm::begin(); ?>
   
    <?php $comisiones = Hora::find()->asArray()->all();
    $horario = ArrayHelper::map($comisiones, 'ID', 'HORA'); ?>

    

    <?= $form->field($model, 'ID_Aula')->textInput() ?>

    <?= $form->field($model, 'ID_Instituto_Recibe')->textInput() ?>

    <?= $form->field($model, 'ID_Tipo_Repeticion')->textInput() ?>

    <?= $form->field($model, 'ID_User_Recibe')->textInput() ?>

    <?= $form->field($model, 'Fecha_ini')->textInput() ?>

    <?php echo $form->field($model, 'Hora_ini')->dropDownList(
       $horario, 
        ['prompt'=>'SELECCIONE LA HORA INICIO...']
        ); ?> 
    <?php echo $form->field($model, 'Hora_fin')->dropDownList(
         $horario, 
        ['prompt'=>'SELECCIONE LA HORA FIN...']
        ); ?> 


    <?= $form->field($model, 'Periodo_Academico')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

