<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  
], 'css-print-theme');

?>

<center><h1>Recursos de aula</h1></center>

 <div class="loginc">
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NOMBRE</th>
                  <th>DESCRIPCION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aula as $aula): ?>
                    <?php foreach ($aula->rECURSOs as $recurso): ?>

                    <td><?= Html::encode("{$recurso->NOMBRE} ") ?>
                    <td><?= Html::encode("{$recurso->DESCRIPCION} ") ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
              </table>
            </div>
</div>
