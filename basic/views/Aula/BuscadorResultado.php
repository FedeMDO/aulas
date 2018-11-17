<?php
use yii\helpers\Html;

$this->registerCssFile("@web/css/index.css", [
	'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');
$this->title = 'Buscador de aulas';
?>

<center><?php if (count($aulasCumplen) != 0) {

	?>
<h3 class=titulo>Aulas Disponibles con los parámetros seleccionados en el edificio <?=Html::encode("{$edi->NOMBRE} ")?></h3>
<div class="col-md-offset-1 col-md-10">
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
                  <th>OBSERVACION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aulasCumplen as $aula): ?>
                <tr>
                  <td><button href="/evento/index" type="button" class="btn btn-success" >AGENDA</button></td>
                  <td ><?=Html::encode("{$aula->ID} ")?></span></td>
                  <td><?=Html::encode("{$aula->NOMBRE} ")?> N°<?=Html::encode("{$aula->ID} ")?></td>
                  <td><?=Html::encode("{$aula->PISO} ")?></td>
                  <td><?=Html::encode("{$aula->CAPACIDAD} ")?>
                  <td><?php $n = 0;
                            foreach ($aula->rECURSOs as $recurso){
                              $n = $n + 1;
                              if (count($aula->rECURSOs)==$n){
                                echo $recurso->NOMBRE;
                              }
                              else{
                                echo $recurso->NOMBRE." - ";
                              }
                            }
                  ?></td>
                  <td>una observacion</td>

                  </td>

                </tr>
                <?php endforeach;?>
              </table>
            </div>

</div>
</div>




<?php
} else {?>

<div class="container">
    <div class="row" style= "width:60%; margin-top:50px;" >
    <img width="220px" height="220" style= "float:left; margin-lelft:50px;"src="../image/buscador.png" />
      <h3 class="titulo" >Lo sentimos no se han encontrado resultados.</h3>
      <br><br><br>
      <a href="../aula/buscador"  class="btn btn-info" style="width:50%" role="button">Volver a intentar</a>
    </div>
</div>
<?php }?>









