<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CicloLectivo;

/* @var $this yii\web\View */
/* @var $model app\models\Sede */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-offset-4 col-md-4">
    <div class="loginc azul">
    <h2 title="Herramienta para migrar las restricciones de un ciclo lectivo a otro." 
    style="color:white; border-bottom: 1px solid white;">
    Migrador de restricciones <strong>&#9432</strong>
    </h2>
        <?php 
        $modelHelper = new \yii\base\DynamicModel(['fromCicloID', 'toCicloID']);
        $modelHelper->addRule(['fromCicloID'], 'unique', ['targetAttribute' => 'toCicloID'])
            ->addRule(['fromCicloID', 'toCicloID'], 'required')
            ->validate();
        $form = ActiveForm::begin();
        $ciclos = CicloLectivo::find()->asArray()->all();
        $resultCiclos = ArrayHelper::map($ciclos, 'id', 'nombre');
        ?>

        <?= $form->field($modelHelper, 'fromCicloID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $resultCiclos,
            ['prompt' => 'Seleccionar']
        )->label('De:');
        ?>

        <?= $form->field($modelHelper, 'toCicloID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $resultCiclos,
            ['prompt' => 'Seleccionar']
        )->label('A:');
        ?>
        

        <div class="form-group">
            <?= Html::submitButton('Migrar', ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
