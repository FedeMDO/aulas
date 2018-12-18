<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Carrera;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */
/* @var $form yii\widgets\ActiveForm */
?>
<div class='materia-form'>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true]) ?>

    <?php $carreras = Carrera::find()->asArray()->all();
    $result = ArrayHelper::map($carreras, 'ID', 'NOMBRE'); ?>
    <?= $form->field($model, 'ID_Carrera', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->dropDownList(
        $result,
        ['prompt' => 'Seleccione...']
    )->label('Carrera'); ?>

    <?= $form->field($model, 'DESC_CORTA', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true])->label("Descripcion corta") ?>

    <?= $form->field($model, 'COD_MATERIA', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true])->label("Codigo de materia") ?>

    <?= $form->field($model, 'anio', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput()->label('Año'); ?>

    <div class="form-group">
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>