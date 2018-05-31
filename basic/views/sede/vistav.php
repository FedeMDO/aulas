<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>



<h3>Sedes</h3>



<div class="bs-example">

<div class="row1">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="../image/sede_unaj.jpeg" alt="..." class="imgsede1">
      <div class="caption">
        <h3>Unaj Central</h3>
        <p>Universidad Nacional Arturo jauretche</p>

        <p><a href="../edificio/edificiov" class="btn btn-primary" role="button">Entrar</a> <a href="#" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>


<div class="row2">
  <div class="col-sm-7 col-md-4">
    <div class="thumbnail">
      <img src="../image/sede_hec.jpg" alt="..."class="imgsede2">
      <div class="caption">
        <h3>Sede HEC</h3>
        <p>Hospital de alta complejidad Doctor Nestor K</p>

        <p><a href="#" class="btn btn-primary" role="button">Entrar</a> <a href="#" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>


<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/sede_generic.jpg" alt="...">
      <div class="caption">
        <h3>Sede TESTING</h3>
        <p>Solo es una test</p>

        <p><a href="#" class="btn btn-primary" role="button">Entrar</a> <a href="#" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>


</div>