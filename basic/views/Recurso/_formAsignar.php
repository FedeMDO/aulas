<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */


$aulaQuery = ArrayHelper::map($aulaResultado, 'ID', 'NOMBRE');
$recursoQuery = ArrayHelper::map($aulaRecurso, 'ID', 'NOMBRE');

?>

<div class="AulaRecurso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model1, 'ID_AULA', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $aulaQuery,
        ['prompt' => 'Choose...']
    )->label("Selecciona un aula"); ?>
     <?php echo $form->field($model1, 'ID_RECURSO', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $recursoQuery,
        ['prompt' => 'Choose...']
    )->label("Selecciona un recurso"); ?>
       <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
