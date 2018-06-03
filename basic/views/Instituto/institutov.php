<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>

<div class="maininsti">


 <div class="list-group">
  <a href="#" class="list-group-item active">Instituto De Ingenieria</a>
  <a href="#" class="list-group-item">Informatica</a>
  <a href="#" class="list-group-item">Petroleo</a>
  <a href="#" class="list-group-item">Electromecanica</a>
  <a href="#" class="list-group-item">Industrial</a>
  <a href="#" class="list-group-item">Transporte</a>
</div>



</div>
