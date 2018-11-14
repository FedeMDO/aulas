<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  
], 'css-print-theme');

$this->title = 'Edificios';
?>
<br>
<br>
<?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
<?php endif; ?>


<center><h2 class=titulo><?php if(count($edificio) != 0){
echo("Edificios Disponibles en la sede "); echo (Html::encode("{$edificio[0]->sEDE->NOMBRE}"));}
else{?>
</h2>
<div class="container imagenrobot">
    <div class="row" style= "width:60%;" >
    <img width="220px" height="220" style= "float:left; margin-lelft:10px;"src="../image/error.png" />
      <br>
      <h3 class="titulo" >No hay edificios creados en esta sede!</h3>
      <br><br><br>
      <a href="../sede/vistav"  class="btn btn-info" style="width:50%" role="button">Volver atras</a>
    </div>
</div>

  <?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
  <?php endif; ?>
</div>


<?php } ?></h3></center>

<ul>
<?php foreach ($edificio as $edificio): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail sede">
      <img src="../image/edi4.png" alt="...">
      <div class="caption">
        <h4><?= Html::encode("{$edificio->NOMBRE} ") ?></h4>
         <img  src="../image/aulaicon.png" alt="  height="42" width="42"">
        <?= Html::encode("{$edificio->CANTIDAD_AULAS} ") ?>
        <p><a href="../aula/aulafilter?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-info" role="button">Entrar</a> <a href="../edificio/update?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-primary" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
<div id="sidebar" class="active">
  <div class="toggle-btn miBoton">
      <span>&#9776;</span>
  </div>
      <ul>
        <li><a href="../aula/buscador" class="btn miBoton btn-md btn-vistav " role="button">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <li>
        <a href="../edificio/create" class="btn miBoton btn-md btn-vistav" role="button">Crear edificio <span class="glyphicon glyphicon-plus"></span></a>
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

