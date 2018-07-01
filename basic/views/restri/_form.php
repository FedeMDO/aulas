<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restri-calendar-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $comisiones = Comision::find()->asArray()->all();
    $result = ArrayHelper::map($comisiones, 'ID', 'NOMBRE'); ?>
     <?php $comisiones = \app\models\Hora::find()->asArray()->all();
    $hora = ArrayHelper::map($comisiones, 'ID', 'HORA'); ?>

    

    <?= $form->field($model, 'ID_Aula')->textInput() ?>

    <?= $form->field($model, 'ID_Instituto_Recibe')->textInput() ?>

    <?= $form->field($model, 'ID_Tipo_Repeticion')->textInput() ?>

    <?= $form->field($model, 'ID_User_Recibe')->textInput() ?>

    <?php echo $form->field($model, 'Hora_ini')->dropDownList(
        $hora, 
        ['prompt'=>'SELECCIONE HORA DE INICIO...']
        ); ?> 

   <?php echo $form->field($model, 'Hora_fin')->dropDownList(
        $hora, 
        ['prompt'=>'SELECCIONE HORA DE fin...']
        ); ?> 

    <?= $form->field($model, 'Periodo_Academico')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
