<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;
/* @var $this yii\web\View */
/* @var $model app\models\Carrera */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $institutos = Instituto::find()->asArray()->all();
    $result = ArrayHelper::map($institutos, 'ID', 'NOMBRE'); ?>

    <?php echo $form->field($model, 'ID_INSTITUTO', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->dropDownList(
        $result, 
        ['prompt'=>'Choose...']
        ); ?>

    <?= $form->field($model, 'NOMBRE', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
