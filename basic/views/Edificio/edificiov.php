<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use app\models\User;
use yii\filters\AccessControl;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  
], 'css-print-theme');

?>

<h1>Edificios Disponibles</h1>

<ul>



<?php foreach ($edificio as $edificio): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/edi4.png" alt="...">
      <div class="caption">
        <?= Html::encode("{$edificio->NOMBRE} ") ?>
        <br></br> 
         <img  src="../image/aulaicon.png" alt="  height="42" width="42"">
        <?= Html::encode("{$edificio->CANTIDAD_AULAS} ") ?>
        <p><a href="../aulafilter?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-primary" role="button">Entrar</a> <a href="../edificio/update?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<?= LinkPager::widget(['pagination' => $pagination]) ?>


</ul>





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
                  <td><button href= type="button" class="btn btn-success">AGENDA</button></td>
                  <td><?= Html::encode("{$aula->ID} ") ?></td>
                  <td><?= Html::encode("{$aula->NOMBRE} ") ?> N°<?= Html::encode("{$aula->ID} ") ?></td>
                  <td><?= Html::encode("{$aula->PISO} ") ?></td>
                  <td><?= Html::encode("{$aula->CAPACIDAD} ") ?>
                  <td><a href=""  class="btn btn-info" role="button">Ver</a></td>
                 
                  </td>
                  
                  <td><a href="../aula/update?id=<?= Html::encode("{$aula->ID}") ?>"  class="btn btn-danger" role="button">Modificar</a></p></td>
                
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
</div>