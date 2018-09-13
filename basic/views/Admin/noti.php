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
<p style="color:white; margin-left:5px";>Notificaciones:</p>

<ul class="nav nav-pills nav-stacked">
  <li class="active"></li>
  <li><a href="#"onclick="openCity(event, 'Recibido')" id="defaultOpen" class="notiboton">Recibidas</a></li>
  <li><a href="#"onclick="openCity(event, 'Enviado')"class="notiboton">Enviadas</a></li>
  <li><a href="#"onclick="openCity(event, 'Enviar notificacion')"class="notiboton">Enviar notificacion</a></li>
</ul>


<div id="Recibido" class="tabcontent">
  <?php foreach ($notificacion as $n):
    if ($n->uSERRECEPTOR->id == Yii::$app->user->identity->id):?>

<div class="panel panel-primary">
    <div class="panel-heading">
    De: <?= Html::encode("{$n->uSEREMISOR->username} ")?> <br>Fecha: <?= Html::encode("{$n->FECHA} ") ?><br/>
    </div>

    <div class="media">
        <div class="media-left">
            <img src="../image/admin_icon.png" class="media-object" style="width:60px; margin-left:10px ;margin-bottom:10px";>
        </div>
        <div class="media-body">
            <?= Html::encode("{$n->NOTIFICACION} ") ?>
        </div>
    </div>

</div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>

<div id="Enviado" class="tabcontent">
  <?php foreach ($notificacion as $n):
    if ($n->uSEREMISOR->id == Yii::$app->user->identity->id):?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Para: <?= Html::encode("{$n->uSERRECEPTOR->username} ")?> <br>Fecha: <?= Html::encode("{$n->FECHA} ") ?><br/>
    </div>

    <div class="media">
        <div class="media-left">
            <img src="../image/admin_icon.png" class="media-object" style="width:60px; margin-left:10px; margin-bottom:10px";>
        </div>
        <div class="media-body">
            <?= Html::encode("{$n->NOTIFICACION} ") ?>
        </div>
    </div>

</div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>

<div id="Enviar notificacion" class="tabcontent">
<div class="loginc">
<center><h3>Enviar notificacion</h3></center>

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