<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');

?>

<div class="col-md-offset-4 col-md-4">
<div class="aula-obs ins loginc azul">
    <?php $form = ActiveForm::begin(); ?>
    <h1 style="color:white; border-bottom: 1px solid white;">Observacion de aula <?= Html::encode($aula->ID) ?></h1>
        <p style="text-align:left"> Observacion actual </p>
        <?php if ($aula->OBS != null): ?>
        <?=  Html::encode($aula->OBS) ?>
        <?=Html::a(' (borrar)', Url::to(['aula/observa?id='.$aula->ID]), ['data' => ['confirm' => 'Estas seguro?', 'method' => 'post', 'params' => ['Aula' => 'borrar', 'id' => $aula->ID]]])?>
        <?php endif; ?>
        <?php if ($aula->OBS == null): ?>
          <?= Html::encode("NO HAY OBSERVACION") ?>
        <?php endif; ?>
        <?= $form->field($model, 'OBS', ['labelOptions'=>['style'=>'color:white']])->label('Nueva observacion') ?>
 
        <div class="form-group">
            <?= Html::submitButton('Confirmar', ['class' => 'btn btn btn-success btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>