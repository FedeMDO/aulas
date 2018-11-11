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
<?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
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
  <?php endif; ?>
  </div>
</div>


<?php } ?></h3>

<?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
<div id="sidebar" class="active">
  <div class="toggle-btn miBoton">
      <span>&#9776;</span>
  </div>
      <ul>
        <li><a href="../aula/buscador" class="btn miBoton btn-md btn-vistav " role="button">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <li>
        <a href="../aula/create" class="btn miBoton btn-md btn-vistav" role="button">Crear aula <span class="glyphicon glyphicon-plus"></span></a>
        </li>
      </ul>
</div>


<div class=""><?=LinkPager::widget(['pagination' => $pagination])?></div>
<?php endif; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="my_jquery_functions.js"></script>
 <script>
  const btnToggle = document.querySelector('.toggle-btn');

  btnToggle.addEventListener('click', function () {
  document.getElementById("sidebar").classList.toggle('active');});
 </script>
<script>
  $(document).ready(function(){
    $("#sidebar").click(function(){
      if ($(this).hasClass('active')){
        $(".col-sm-8").css({"left": "0px", "transition": "all 500ms linear"});
      }else{
        $(".col-sm-8").css({"left": "200px", "transition": "all 500ms linear"});
      }
    });
  });
</script>
<script type=’text/javascript’>
</script>
</ul>



