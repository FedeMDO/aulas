<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  
], 'css-print-theme');



?>

<h1>Edificios Disponibles</h1>

<ul>



<?php foreach ($edificio as $edificio): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/edi4.png" alt="...">
      <div class="caption">

        <?= Html::encode("{$edificio->NOMBRE} ") ?>
        <br></br> 
         <img  src="../image/aulaicon.png" alt="  height="42" width="42"">
        <?= Html::encode("{$edificio->CANTIDAD_AULAS} ") ?>
        <p><a href="#" class="btn btn-primary" role="button">Entrar</a> <a href="../edificio/update?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>





</ul>

