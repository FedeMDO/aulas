<?php

use app\models\Notificacion;
use dominus77\sweetalert2;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile("@web/css/index.css", [
	'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->title = 'Notificaciones';
?>
<!--Esto saca el scroll principal-->






<!-- Side navigation -->
<div class="sidenav">
<a href="#"onclick="openCity(event, 'Recibido')" id="defaultOpen" class="notiboton"><i class="glyphicon glyphicon-inbox"></i>  Recibidas</a>
<a href="#"onclick="openCity(event, 'Enviado')"class="notiboton"><i class="glyphicon glyphicon-envelope"></i>  Enviadas</a>
<a href="#"onclick="openCity(event, 'Enviar notificacion')"class="notiboton"><i class="glyphicon glyphicon-plus"></i> Nueva notificacion</a>
</div>

<!-- Page content -->
<div class="main">
<style type="text/css">
body {
    overflow:hidden;
}
@media screen and (max-width: 700px) {
  body{
    overflow:scroll;
  }
}
</style>

<body>
<?php if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)):

	\dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);

endif;?>
<?php
?>

<div id="Recibido" class="tabcontent media border p-3 enviado">
<?php $entro = false;?>
 <?php foreach ($notificacion as $n):
	if ($n->uSERRECEPTOR->id == Yii::$app->user->identity->id): ?>
					    <?php $entro = true;?>
					  <img src="../image/admin_icon.png" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
					  <div class="media-body">
					    <h4><?=Html::encode("{$n->uSEREMISOR->username} ")?> <small><i>Fecha: <?=Html::encode("{$n->FECHA} ")?></i></small></h4>
					    <p><?=$n->NOTIFICACION?></p>
					  </div>
					  <?php endif;?>
  <?php endforeach;?>
  <?php if ($entro == false): ?>
  <div class="alert alert-danger">
  <p>No tienes mensajes recibidos.</p>
  </div>
  <?php endif;?>
</div>


<div id="Enviado" class="tabcontent media border p-3 enviado">
<?php $entro = false;?>
 <?php foreach ($notificacion as $n):
	if ($n->uSEREMISOR->id == Yii::$app->user->identity->id): ?>
					    <?php $entro = true;?>
					  <img src="../image/admin_icon.png" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
					  <div class="media-body">
					    <h4>Para: <?=Html::encode("{$n->uSERRECEPTOR->username} ")?>
					    <small><i>Fecha: <?=Html::encode("{$n->FECHA} ")?></i></small>
					    <small><?=Html::a('borrar', Url::to(['site/noti']), ['data' => ['confirm' => 'Estas seguro?', 'method' => 'post', 'params' => ['Notificacion' => 'borrar', 'id' => $n->ID]]])?></small></h4>
					    <p><?=$n->NOTIFICACION?></p>
					 </div>
					  <?php endif;?>
  <?php endforeach;?>
  <?php if ($entro == false): ?>
  <div class="alert alert-danger">
  <p>No tienes mensajes enviados.</p>
  </div>
  <?php endif;?>
</div>

<div id="Enviar notificacion" class="tabcontent mensaje">
<div class="notificacion-create">
        <?=$this->render('_form', [
	'model' => $model,
	'usuarios' => $usuarios])?>

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
</div>