<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>





<?php foreach ($instituto as $instituto): ?>


<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
  <?= Html::encode("{$instituto->NOMBRE} ") ?>
  </a>
  <a href="../carrera/" class="list-group-item list-group-item-action"><?= Html::encode("{$instituto->COLOR_HEXA} ") ?></a>
</div>
        <br></br>
    
<?php endforeach; ?>
