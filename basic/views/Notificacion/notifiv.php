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


<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
  <?= Html::encode("{$notificacion->NOTIFICACION} ") ?>
  </a>
 
</div>
        <br></br>
    
<?php endforeach; ?>


<!-- Left-aligned -->
<div class="media">
  <div class="media-left">
    <img src="img_avatar1.png" class="media-object" style="width:60px">
  </div>
  <div class="media-body">
    <h4 class="media-heading">John Doe</h4>
    <p>Lorem ipsum...</p>
  </div>
</div>

<!-- Right-aligned -->
<div class="media">
  <div class="media-body">
    <h4 class="media-heading">John Doe</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
  <div class="media-right">
    <img src="img_avatar1.png" class="media-object" style="width:60px">
  </div>
</div>