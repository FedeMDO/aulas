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



<?php if(count($aula) != 0){

?>
<div class="col-md-offset-1 col-md-10">
<h3 style="color:white; text-align:center;">Aulas disponibles en <?=Html::encode("{$aula[0]->eDIFICIO->NOMBRE}")?></h3>
<?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
<a style= "" href="../aula/create" class="btn btn-success btn-md" role="button">Crear Aula</a>
<?php endif; ?>
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
                
                  <td><a href="../evento/index?id=<?= Html::encode("{$aula->ID}") ?>" class="btn btn-primary" role="button">AGENDA</a></td>
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





<?php
}
else{?>

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">ATENCION!</h4>
  <p class="text-center">NO HAY AULAS CREADAS EN ESTE EDIFICIO</p>
  <hr>
  <div class="text-center">
  <?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
  <a href="../aula/create" class="btn btn-danger btn-md" role="button">CREAR AULA</a>
  <?php endif; ?>
  </div>
</div>


<?php } ?></h3>









