<?php

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\controllers\NotificacionController;
use app\views\Notificacion\create;
use yii\bootstrap\Alert;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');

$this->title = 'Notificaciones';
?>
<!--Esto saca el scroll principal-->

<style type="text/css">
body {
    overflow:hidden;
}
</style>

<body>
<!-- // lanzando alerta bootstrap -->
<?php if(Yii::$app->session->hasFlash('notificacionEnviada')):
    Alert::begin([
      'options' => [
          'class' => 'alert-success',
      ],
  ]);
  
  echo Yii::$app->session->getFlash('notificacionEnviada');
  
  Alert::end();
endif; ?>
<?php
  ?>
<nav class="nav navbar-inverse navbar-left">
  <a class="active"></a>
  <li><a href="#"onclick="openCity(event, 'Recibido')" id="defaultOpen" class="notiboton"><i class="glyphicon glyphicon-inbox"></i>  Recibidas</a></li>
  <li><a href="#"onclick="openCity(event, 'Enviado')"class="notiboton"><i class="glyphicon glyphicon-envelope"></i>  Enviadas</a></li>
  <li><a href="#"onclick="openCity(event, 'Enviar notificacion')"class="notiboton"><i class="glyphicon glyphicon-plus"></i> Nueva notificacion</a></li>
</nav>



<div id="Recibido" class="tabcontent media border p-3 enviado">
<?php $entro=false; ?>
 <?php foreach ($notificacion as $n):
    if ($n->uSERRECEPTOR->id == Yii::$app->user->identity->id):?>
    <?php $entro= true; ?>
  <img src="../image/admin_icon.png" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
  <div class="media-body">
    <h4><?= Html::encode("{$n->uSEREMISOR->username} ")?> <small><i>Fecha: <?= Html::encode("{$n->FECHA} ") ?></i></small></h4>
    <p><?=$n->NOTIFICACION ?></p>
  </div>
  <?php endif; ?>
  <?php endforeach; ?>  
  <?php if ($entro==false):?>
  <div class="alert alert-danger">
  <p>No tienes mensajes recibidos.</p>
  </div>
  <?php endif;?> 
</div>


<div id="Enviado" class="tabcontent media border p-3 enviado">
<?php $entro=false; ?>
 <?php foreach ($notificacion as $n):
    if ($n->uSEREMISOR->id == Yii::$app->user->identity->id):?>
    <?php $entro= true; ?>
  <img src="../image/admin_icon.png" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
  <div class="media-body">
    <h4>Para: <?=Html::encode("{$n->uSERRECEPTOR->username} ")?> <small><i>Fecha: <?= Html::encode("{$n->FECHA} ") ?></i></small></h4>
    <p><?=$n->NOTIFICACION ?></p>
 </div>
  <?php endif; ?>
  <?php endforeach; ?>
  <?php if ($entro==false):?>
  <div class="alert alert-danger">
  <p>No tienes mensajes enviados.</p>
  </div>
  <?php endif;?>  
</div>

<div id="Enviar notificacion" class="tabcontent mensaje">
<div class="notificacion-create">

    <?= $this->render('_form', [
        'model' => $model,
        'usuarios' => $usuarios,
    ]) ?>

</div>

</div>
</div>
<script>

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

</script>


</body>

<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Notificaciones</a>
    </div>
    <a href="../notificacion/create" class="btn btn-success">Enviar notificacion</a>
  <a href="../notificacion/delete" class="btn btn-primary">Eliminar</a>
  <a href="../notificacion/update" class="btn btn-primary">Modificar</a>
  <a href="../notificacion/index" class="btn btn-primary">Ver Notificaciones</a>



    <button class="btn btn-danger navbar-btn">Configuracion</button>
  </div>
</nav>

<h1>HOLA ESTOY EN NOTIFICACIONES </h1> -->