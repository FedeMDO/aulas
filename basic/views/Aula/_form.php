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

    <?= $form->field($model, 'NOMBRE',['labelOptions'=>['style'=>'color:white']])->textInput(['maxlength' => true]) ?>

        <?php $edificios = Edificio::find()->asArray()->all();
         $result = ArrayHelper::map($edificios, 'ID', 'NOMBRE'); ?>
    
    <?php echo $form->field($model, 'ID_EDIFICIO',['labelOptions'=>['style'=>'color:white']])->dropDownList(
            $result, 
			['prompt'=>'Choose...']
			); ?>

    <?= $form->field($model, 'PISO',['labelOptions'=>['style'=>'color:white']])->textInput() ?>

    <?= $form->field($model, 'CAPACIDAD',['labelOptions'=>['style'=>'color:white']])->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
