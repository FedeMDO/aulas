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

<center><?php if (!empty($matched)) {

          ?>
<div class="col-md-offset-1 col-md-10">
<h2 class=titulo style="text-align:center;">Horarios encontrados de la materia <?= Html::encode("{$nombre} ") ?></h2>
  <div class="caja aulafilter" style="background-color:white">
    <div class="box-body">
      <div class="table-responsive">          
        <table class="table" style="margin-bottom:0px">
                <thead>
                <tr>
                  <th>AGENDA</th>
                  <th>DIA</th>
                  <th>HORA INICIO</th>
                  <th>HORA FIN</th>
                  <th>COMISION</th>
                  <th>AULA</th>
                  <th>OBSERVACION DE AULA</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($matched as $evento) : ?>
                <tr>
                  <td><a href="/evento/index?id=<?= Html::encode("{$evento->ID_Aula}") ?>" type="button" class="btn btn-primary" >VER</button></td>
                  <td><?php switch ($evento->dow){
                      case 1:
                        echo "Lunes";
                        break;
                      case 2:
                        echo "Martes";
                        break;
                      case 3:
                        echo "Miercoles";
                        break;
                      case 4:
                        echo "Jueves";
                        break;
                      case 5:
                        echo "Viernes";
                        break;
                      case 6:
                        echo "Sabado";
                        break;
                  } ?></td>
                  <td><?= Html::encode("{$evento->Hora_ini} ") ?></td>
                  <td><?= Html::encode("{$evento->Hora_fin} ") ?></td>
                  <td><?= Html::encode("{$evento->comision->NUMERO} ") ?>
                  <td><?= Html::encode("{$evento->aula->NOMBRE} ") ?></td>
                  <td>
                  <?php if ($evento->aula->OBS != null) : ?>
                  <?php echo $evento->aula->OBS ?><a href="../aula/observa?id=<?= Html::encode("{$evento->aula->ID}") ?>" class="glyphicon glyphicon-pencil" style="margin-left:4px"></a>
                  <?php else : ?>
                  <p>No hay observacion. <a href="../aula/observa?id=<?= Html::encode("{$evento->aula->ID}") ?>" class="glyphicon glyphicon-pencil"></a></p>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
</div>
<a href="../materia/buscador" class="btn btn-info button1" role="button">Buscar otra vez</a>
</div>
</div>

<?php

} else { ?>

<div class="container">
    <div class="row" style= "width:60%; margin-top:50px;" >
    <img width="220px" height="220" style= "float:left; margin-lelft:50px;"src="../image/buscador.png" />
      <h3 class="titulo" >Lo sentimos no se han encontrado resultados.</h3>
      <br><br><br>
      <a href="../materia/buscador"  class="btn btn-info" style="width:50%" role="button">Volver a intentar</a>
    </div>
</div>
<?php 
} ?>









