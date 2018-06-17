<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  
], 'css-print-theme');

?>

<h1>Aulas Disponibles</h1>

<ul>


<?php foreach ($aula as $aula): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/edi4.png" alt="...">
      <div class="caption">
        <?= Html::encode("{$aula->NOMBRE} ") ?>
        <br></br> 
         <img  src="../image/aulaicon.png" alt="  height="42" width="42"">
        <?= Html::encode("{$aula->CAPACIDAD} ") ?>
        <?= Html::encode("{$aula->PISO} ") ?>
        <p><a href="../aulafilter?id=<?= Html::encode("{$aula->ID}") ?>" class="btn btn-primary" role="button">Entrar</a> <a href="../edificio/update?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<H1>HOLA ESTOY EN AULA FILTER</H1>



</ul>

