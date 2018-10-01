<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Materia;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
/* @var $model app\models\Comision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comision-form">

    <?php if(Yii::$app->session->hasFlash('comisionesCreadas')):
    Alert::begin([
      'options' => [
          'class' => 'alert-success',
      ],
  ]);
  
  echo Yii::$app->session->getFlash('comisionesCreadas');
  
  Alert::end();
endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?php $materias = Materia::find()->asArray()->all();
    $result = ArrayHelper::map($materias, 'ID', 'NOMBRE'); ?>

    <?php echo $form->field($model, 'ID_MATERIA')->dropDownList(
        $result, 
        ['prompt'=>'Choose...']
        ); ?>

    <?= $form->field($model, 'CARGA_HORARIA_SEMANAL')->textInput() ?>
    <?= $form->field($model, 'cant_comisiones')->textInput()->label("Selecciona la cantidad de comisiones que desea crear") ?>

    <div class="form-group">
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success formu']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
