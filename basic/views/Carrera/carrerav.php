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


$this->title = 'Carreras';

?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
  <h3 style="color:white; border-bottom: 1px solid white;">Informacion carreras</h3>
  <div class="panel-group">
    <?php $aux = 0;
    $b = "";
    $in = "collapse";
    $aux2 = false;
    ?>
    <?php foreach ($carrera as $car) :
      $aux++;
    $color = $car->iNSTITUTO->COLOR_HEXA;
    $b = "";
    ?>
      <?php if ($aux == 1) {
        $in = "collapse in";
      } else {
        $in = "collapse";
      }

      ?>
      <button type="button" style="background-color:<?php echo $color; ?>" class="btn btn-info btn-block miPanel" data-toggle="collapse" data-target="#demo<?php echo $aux; ?>"><?= Html::encode("$car->NOMBRE") ?><i class="more-less glyphicon glyphicon-plus" style="float:right"></i></button>
    <!-- ME FIJO SI NO TIENE USUARIOS -->
    <?php if (count($car->materias) == 0) { ?>
      <p style="color:white">Sin materias en esta carrera</p>
    <?php

  } ?>
    <!-- ITERO LOS USUARIOS DE CADA INSTITUTO Y SACO SUS DATOS -->
    <?php foreach ($car->materias as $materia) : ?></p>
    <?php 
    $b = $b . $materia->NOMBRE . "\n" ?>
    <?php endforeach; ?>
    <div id="demo<?php echo $aux; ?>" class="<?php echo $in; ?>">
    <?php $b = str_replace(array("\r\n", "\r", "\n"), "<br />", $b); ?> 
    <p style="color:white;"><?php echo $b; ?></p>
  </div>
  <?php endforeach; ?>
  </div>
</div>
  
</div>
