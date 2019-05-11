<?php
use yii\helpers\Html;

$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');
$this->title = 'Buscador de aulas';
?>

<style>

thead{
    background-color: #2980b9;
    border:0px;
}
th{
    border:0px;
    color:white;
}

tr:nth-child(even) {background-color: #f2f2f2;}

.table-responsive{
    margin-top:20px;
}


</style>


<?= \yii\helpers\Url::remember(); ?>
<center><?php if (count($aulasCumplen) != 0) {

          ?>
<div class="col-md-offset-1 col-md-10">
<h2 class=titulo style="text-align:center;">Aulas disponibles con los parámetros seleccionados en <?= Html::encode("{$edi->NOMBRE} ") ?></h2>
<div class="caja aulafilter" style="background-color:white">
<div class="box-body">
  <div class="table-responsive">
    <table class="table" style="margin-bottom:0px">
                <thead>
                <tr>
                  <th>AGENDA</th>
                  <th>NOMBRE</th>
                  <th>PISO</th>
                  <th>CAPACIDAD</th>
                  <th>RECURSOS</th>
                  <th>OBSERVACION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aulasCumplen as $aula) : ?>
                <tr>
                  <td><a href="/evento/index?id=<?= Html::encode("{$aula->ID}") ?>" type="button" class="btn btn-primary" >VER</button></td>
                  <td><?= Html::encode("{$aula->NOMBRE} ") ?></td>
                  <td><?= Html::encode("{$aula->PISO} ") ?></td>
                  <td><?= Html::encode("{$aula->CAPACIDAD} ") ?>
                  <td><?php $n = 0;
                      foreach ($aula->rECURSOs as $recurso) {
                        $n = $n + 1;
                        if (count($aula->rECURSOs) == $n) {
                          echo $recurso->NOMBRE;
                        } else {
                          echo $recurso->NOMBRE . " - ";
                        }
                      }
                      ?></td>
                  <td>
                  <?php if ($aula->OBS != null) : ?>
                  <?php echo $aula->OBS ?><a href="../aula/observa?id=<?= Html::encode("{$aula->ID}") ?>" class="glyphicon glyphicon-pencil" style="margin-left:4px"></a>
                  <?php else : ?>
                  <p>No hay observacion. <a href="../aula/observa?id=<?= Html::encode("{$aula->ID}") ?>" class="glyphicon glyphicon-pencil"></a></p>
                  <?php endif; ?>
                  </td>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
</div>
<a href="../aula/buscador" class="btn btn-info button1" role="button">Buscar otra vez</a>
</div>

<?php

} else { ?>

<div class="container">
    <div class="row" style= "width:60%; margin-top:50px;" >
    <img width="220px" height="220" style= "float:left; margin-lelft:50px;"src="../image/buscador.png" />
      <h3 class="titulo" >Lo sentimos no se han encontrado resultados.</h3>
      <br><br><br>
      <a href="../aula/buscador"  class="btn btn-info" style="width:50%" role="button">Volver a intentar</a>
    </div>
</div>
<?php 
} ?>









