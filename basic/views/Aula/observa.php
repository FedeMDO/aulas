<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Observacion';

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');

?>

<div class="col-md-offset-4 col-md-4">
<div class="aula-obs ins loginc azul">
    <?php $form = ActiveForm::begin(); ?>
    <h1>Observacion de aula <?= Html::encode($aula->NOMBRE) ?></h1>
        <p style= "text-align:left; padding-top:5px" >Observacion actual</p> 
        <?php if ($aula->OBS != null): ?>
        <p class= "miPanel" style="font-style:italic; color:#c9d3d3; border: 1px solid white;"> <?=  Html::encode($aula->OBS) ?></p>
        <i><?=Html::a('Borrar', Url::to(['aula/observa?id='.$aula->ID]), ['style' => 'color:#ac1515;', 'data' => ['confirm' => 'Estas seguro?', 'method' => 'post', 'params' => ['Aula' => 'borrar', 'id' => $aula->ID]]])?></i>
        <?php endif; ?>
        <?php if ($aula->OBS == null): ?>
        <p class= "miPanel" style="font-style:italic; color:#c9d3d3; border: 1px solid white;"> <?= Html::encode("No hay observacion.") ?> </p>
        <?php endif; ?>
        <?= $form->field($model, 'OBS', ['labelOptions'=>['style'=>'color:white']])->label('Nueva observacion') ?>
        <div class="form-group">
            <?= Html::submitButton('Confirmar', ['class' => 'btn btn btn-success btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>