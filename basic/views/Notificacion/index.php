<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>




<?php foreach ($notificacion as $notificacion): ?>


<div class="panel panel-primary">
      <div class="panel-heading">De: <?= Html::encode("{$notificacion->uSEREMISOR->username} ") ?></div>
      <div class="panel-heading">Para: <?= Html::encode("{$notificacion->uSERRECEPTOR->username} ") ?></div>


      
    <div class="panel-body">
      
      
     <div class="media">
    <div class="media-left">
        <img src="../image/admin_icon.png" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
           
    <?= Html::encode("{$notificacion->NOTIFICACION} ") ?>
    </div>
    </div>
      
      
      
    </div>
</div>
    
<?php endforeach; ?>





