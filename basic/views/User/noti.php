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
<?php if(Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)):

\dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);
 
endif; ?>
<?php

    
  ?>
<p>NOTIFICACIONES:</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Recibido')" id="defaultOpen">Recibido</button>
  <!-- <button class="tablinks" onclick="openCity(event, 'Enviado')">Enviado</button>
  <button class="tablinks" onclick="openCity(event, 'Enviar notificacion')">Enviar notificacion</button> -->
</div>

<div id="Recibido" class="tabcontent">
  <h3>Recibido</h3>
  <?php foreach ($notificacion as $n):
    if ($n->uSERRECEPTOR->id == Yii::$app->user->identity->id):?>
<div class="panel panel-primary">
     
<?= Html::encode("{$n->FECHA} ") ?></div>


      
    <div class="panel-body">
      
      
     <div class="media">
    <div class="media-left">
        <img src="../image/admin_icon.png" class="media-object" style="width:60px">
        <div class="panel-heading"><?= Html::encode("{$n->uSEREMISOR->username} ") ?></div>
    </div>
    <div class="media-body">
           
    <?= Html::encode("{$n->NOTIFICACION} ") ?>
    </div>
    </div>
      
      
      
    </div>
</div>
<?php endif; ?>
<?php endforeach; ?>
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