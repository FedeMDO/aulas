<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>
<div class="btn-group btn-group-justified">

  <a href="../notificacion/create" class="btn btn-success">Crear Notificacion</a>
  <a href="../notificacion/delete" class="btn btn-primary">Eliminar</a>
  <a href="../notificacion/update" class="btn btn-primary">Modificar</a>
  <a href="../notificacion/index" class="btn btn-primary">Ver Notificaciones</a>



  
</div>


<h1>HOLA ESTOY EN NOTIFICACIONES </h1>