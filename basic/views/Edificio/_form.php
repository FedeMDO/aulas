<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sede;
/* @var $this yii\web\View */
/* @var $model app\models\Edificio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edificio-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $sedes = Sede::find()->asArray()->all();
    $result = ArrayHelper::map($sedes, 'ID', 'NOMBRE');
    ?>
    <?php echo $form->field($model, 'ID_SEDE', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $result,
        ['prompt' => 'Choose...']
    ); ?>

    <?= $form->field($model, 'NOMBRE', ['labelOptions' => ['style' => 'color:white']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CANTIDAD_AULAS', ['labelOptions' => ['style' => 'color:white']])->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
