<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>



<h1>SEDES</h1>


<div class="gallery">
    <a href="../site/index">
     <img src="../image/sede_unaj.jpeg" alt="Avatar" class="image" >
    </a>
  <img src="../image/sede_hec.jpg" alt="Avatar" class="image" >
  <img src="../image/sede_generic.jpg" alt="Avatar" class="image" >
</div>

