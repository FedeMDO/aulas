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

<div class="loginc ins">
  <h3>Informacion Institutos</h3>
  <div class="panel-group">  
    <!-- ITERO LOS INSTITUTOS -->
    <?php foreach ($instituto as $ins): ?>
    <div class= "panel panel-primary"> 
      <div class="panel-heading headingins" style="text-transform: uppercase;"><?= Html::encode("{$ins->NOMBRE} ")?></div>
    </div>
  
    <!-- ME FIJO SI NO TIENE USUARIOS -->
    <?php if (count($ins->users) == 0){ ?>
      <p>Sin usuarios de este instituto</p>
    <?php
    } ?>
    <!-- ITERO LOS USUARIOS DE CADA INSTITUTO Y SACO SUS DATOS -->
    <?php foreach ($ins->users as $user): ?></p>
      <p><?= Html::encode("{$user->username} ") ?> - <?= Html::encode("{$user->email} ") ?></p> 
    <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
</div>
