<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Comision;
use app\models\Hora;

/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-calendar-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $comisiones = Comision::find()->asArray()->all();
    $result = ArrayHelper::map($comisiones, 'ID', 'NOMBRE'); ?>
    <?php echo $form->field($model, 'ID_Comision')->dropDownList(
        $result, 
        ['prompt'=>'SELECCIONE LA COMISION...']
        )->label(' COMISION '); ?> 
    <?= $form->field($model, 'ID_User_Asigna')->textInput(['class' => 'form-control class-content-title_series', 'placeholder' => 'Title', 'disabled' => 'true','value'=>$nombreusuario])->label(' USUARIO '); ?>
    <?= $form->field($model, 'ID_Aula')->textInput(['class' => 'form-control class-content-title_series', 'placeholder' => 'Title', 'disabled' => 'true' ,'value'=>$aula1])->label(' AULA '); ?>
    <?= $form->field($model, 'Fecha_ini')->textInput(['disabled' => 'true']) ?>
    <?php $comisiones = Hora::find()->asArray()->all();
    $result = ArrayHelper::map($comisiones, 'ID', 'HORA'); ?>
       <?php echo $form->field($model, 'Hora_ini')->dropDownList(
        $result, 
        ['prompt'=>'SELECCIONE LA HORA DE INICIO......']
        ); ?> 

          <?php echo $form->field($model,'Hora_fin')->dropDownList(
        $result, 
        ['prompt'=>'SELECCIONE LA HORA DE FIN.......']
        ); ?> 
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
