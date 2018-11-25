<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituto;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username',['labelOptions'=>['style'=>'color:white']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email',['labelOptions'=>['style'=>'color:white']])->textInput() ?>

    <?php $institutos = Instituto::find()->asArray()->all();
    $result = ArrayHelper::map($institutos, 'ID', 'NOMBRE'); ?>

    <?= $form->field($model, 'idInstituto',['labelOptions'=>['style'=>'color:white']])->dropdownList(
        $result,
        ['prompt' => '(sin instituto)']
    )->label('Instituto'); ?>

    <?php $roles = [ 10 => 'Simple', 20 => 'Administrador', 30 => 'Guest']; ?>

    <?= $form->field($model, 'rol',['labelOptions'=>['style'=>'color:white']])->dropdownList(
        $roles
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>