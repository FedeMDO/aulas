<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;

$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  

  
], 'css-print-theme');
$this->title = 'Aulas';
?>



<?php if(count($aula) != 0){

?>
<div class="col-md-offset-1 col-md-10">
<h2 class=titulo style="text-align:center;">Aulas disponibles en <?=Html::encode("{$aula[0]->eDIFICIO->NOMBRE}")?></h2>
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
                  <?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
                  <th>EDITAR</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aula as $aula): ?>
                <tr>
                <td><a href="/evento/index?id=<?= Html::encode("{$aula->ID}") ?>" type="button" class="btn btn-primary" >AGENDA</button></td>
                  <td ><?=Html::encode("{$aula->ID} ")?></span></td>
                  <td><?=Html::encode("{$aula->NOMBRE} ")?> N°<?=Html::encode("{$aula->ID} ")?></td>
                  <td><?=Html::encode("{$aula->PISO} ")?></td>
                  <td><?=Html::encode("{$aula->CAPACIDAD} ")?></td>
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
                  <td>
                  <?php if ($aula->OBS != null):?> 
                  <?php echo $aula->OBS ?><a href="../aula/observa?id=<?=Html::encode("{$aula->ID}")?>" class="glyphicon glyphicon-pencil" style="margin-left:4px"></a>
                  <?php else:?>
                  <p>No hay observacion. <a href="../aula/observa?id=<?=Html::encode("{$aula->ID}")?>" class="glyphicon glyphicon-pencil"></a></p>
                  <?php endif; ?>
                  </td>
                  <?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
                  <td><a href="../aula/update?id=<?= Html::encode("{$aula->ID}") ?>"  class="btn btn-warning" role="button">Modificar</a></p></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            
</div>
</div>




<?php
}
else{?>

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">ATENCION!</h4>
  <p class="text-center">NO HAY AULAS CREADAS EN ESTE EDIFICIO</p>
  <hr>
  <div class="text-center">
  </div>
</div>


<?php } ?></h3>

<div id="sidebar" class="active">
  <div class="toggle-btn miBoton">
      <span>&#9776;</span>
  </div>
      <ul>
        <li><a href="../aula/buscador" class="btn miBoton btn-md btn-vistav " role="button">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
        <li>
        <a href="../aula/create" class="btn miBoton btn-md btn-vistav" role="button">Crear aula <span class="glyphicon glyphicon-plus"></span></a>
        </li>
        <?php endif; ?>
      </ul>
</div>