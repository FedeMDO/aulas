<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  

  
], 'css-print-theme');
$this->title = 'Aulas';
?>
<a href="../aula/create" class="btn btn-success btn-md" role="button">Crear Aula</a>


<center><h3>Aulas Disponibles</h3></center>

 <div class="loginc">
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>AGENDA</th>
                  <th>N°</th>
                  <th>NOMBRE</th>
                  <th>PISO</th>
                  <th>CAPACIDAD</th>
                  <th>RECURSOS</th>
                  <th>EDITAR</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aula as $aula): ?>
                <tr>
                  <td><button href="/evento/index" type="button" class="btn btn-success" >AGENDA</button></td>
                  <td ><?= Html::encode("{$aula->ID} ")?></span></td>
                  <td><?= Html::encode("{$aula->NOMBRE} ") ?> N°<?= Html::encode("{$aula->ID} ") ?></td>
                  <td><?= Html::encode("{$aula->PISO} ") ?></td>
                  <td><?= Html::encode("{$aula->CAPACIDAD} ") ?>
                  <td><a href="../aula/recursos?id=<?= Html::encode("{$aula->ID}") ?>"  class="btn btn-info" role="button">Ver</a></td>
                 
                  </td>
                  
                  <td><a href="../aula/update?id=<?= Html::encode("{$aula->ID}") ?>"  class="btn btn-danger" role="button">Modificar</a></p></td>
                
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            
</div>

