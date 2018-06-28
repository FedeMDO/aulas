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
    <?php echo $form->field($model, 'ID_SEDE')->dropDownList(
            $result, 
			['prompt'=>'Choose...']
			); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CANTIDAD_AULAS')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
