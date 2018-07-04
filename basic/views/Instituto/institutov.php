<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');

$this->title = 'Institutos';
?>





<?php foreach ($instituto as $ins): ?> <!-- ITERO LOS INSTITUTOS -->
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
  <?= Html::encode("{$ins->NOMBRE} ") ?>
  </a>
  <?php if (count($ins->users) == 0){ ?> <!-- ME FIJO SI NO TIENE USUARIOS -->

    <a href="#" class="list-group-item list-group-item-action">Sin usuarios de este instituto</a> <!-- ACA HACER LAS COSAS QUE HAY QUE HACER SI INSTITUTO NO TIENE USER-->
  <?php
  } ?>
  <?php foreach ($ins->users as $user): ?> <!-- ITERO LOS USUARIOS DE CADA INSTITUTO Y SACO SUS DATOS -->

  <a href="#" class="list-group-item list-group-item-action"><?= Html::encode("{$user->username} ") ?> - <?= Html::encode("{$user->email} ") ?></a>
</div>
        <br></br>
  <?php endforeach; ?>
<?php endforeach; ?>
