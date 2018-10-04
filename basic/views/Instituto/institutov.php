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
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
  <h3 style="color:white; border-bottom: 1px solid white;">Informacion Institutos</h3>
  <div class="panel-group">  
    <!-- ITERO LOS INSTITUTOS -->
    <?php foreach ($instituto as $ins): ?>
    <div class= "panel panel-default"> 
      <div class="panel-heading headingins" style="text-transform: uppercase;"><?= Html::encode("{$ins->NOMBRE} ")?></div>
    </div>
  
    <!-- ME FIJO SI NO TIENE USUARIOS -->
    <?php if (count($ins->users) == 0){ ?>
      <p style="color:white">Sin usuarios de este instituto</p>
    <?php
    } ?>
    <!-- ITERO LOS USUARIOS DE CADA INSTITUTO Y SACO SUS DATOS -->
    <?php foreach ($ins->users as $user): ?></p>
      <p style="color:white"><?= Html::encode("{$user->username} ") ?> - <?= Html::encode("{$user->email} ") ?></p> 
    <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
</div>
