<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Notificaciones</a>
    </div>
    <a href="../notificacion/create" class="btn btn-success">Crear Notificacion</a>
  <a href="../notificacion/delete" class="btn btn-primary">Eliminar</a>
  <a href="../notificacion/update" class="btn btn-primary">Modificar</a>
  <a href="../notificacion/index" class="btn btn-primary">Ver Notificaciones</a>



    <button class="btn btn-danger navbar-btn">Configuracion</button>
  </div>
</nav>

<h1>HOLA ESTOY EN NOTIFICACIONES </h1>