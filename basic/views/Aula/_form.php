<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Edificio;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

        <?php $edificios = Edificio::find()->asArray()->all();
         $result = ArrayHelper::map($edificios, 'ID', 'NOMBRE'); ?>
    
    <?php echo $form->field($model, 'ID_EDIFICIO')->dropDownList(
            $result, 
			['prompt'=>'Choose...']
			); ?>

    <?= $form->field($model, 'PISO')->textInput() ?>

    <?= $form->field($model, 'CAPACIDAD')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
