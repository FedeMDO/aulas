<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Materia;
/* @var $this yii\web\View */
/* @var $model app\models\Comision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?php $materias = Materia::find()->asArray()->all();
    $result = ArrayHelper::map($materias, 'ID', 'NOMBRE'); ?>

    <?php echo $form->field($model, 'ID_MATERIA')->dropDownList(
        $result, 
        ['prompt'=>'Choose...']
        ); ?>

    <?= $form->field($model, 'CARGA_HORARIA_SEMANAL')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
