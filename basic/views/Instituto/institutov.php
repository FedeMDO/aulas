<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;



$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->registerJsFile(
  '@web/js/main.js',
  ['depends' => [\yii\web\JqueryAsset::className()]]
);


$this->title = 'Institutos';

?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
  <h3 style="color:white; border-bottom: 1px solid white;">Informacion de Institutos</h3>
  <div class="panel-group">
    <?php $aux = 0;
    $b = "";
    $aux2 = false;
    ?>
    <?php foreach ($instituto as $car) :
      $aux++;
    $color = " $car->COLOR_HEXA";
    $b = "";
    ?>
      <button type="button" style="background-color:<?php echo $color; ?>" class="btn btn-info btn-block miPanel" data-toggle="collapse" data-target="#demo<?php echo $aux; ?>"><?= Html::encode("$car->NOMBRE") ?><i class="more-less glyphicon glyphicon-plus" style="float:right"></i></button>
    <!-- ME FIJO SI NO TIENE USUARIOS -->
    <?php if (count($car->users) == 0) {
      $b = $b . "Sin usuarios de este instituto" . "\n";; ?>
      <p></p>
    <?php

  } ?>
    <!-- ITERO LOS USUARIOS DE CADA INSTITUTO Y SACO SUS DATOS -->
    <?php foreach ($car->users as $materia) : ?>
    <?php 
    $b = $b . $materia->username . ": " . $materia->email . "\n" ?>
      </p>
    <?php endforeach; ?>
    <div id="demo<?php echo $aux; ?>" class="collapse in">
    <?php $b = str_replace(array("\r\n", "\r", "\n"), "<br />", $b); ?> 
    <p style="color:white;"><?php echo $b; ?></p>
  </div>
  <?php endforeach; ?>
  </div>
</div>
  
</div>
