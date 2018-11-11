<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->registerCssFile("@web/css/index.css", [
	'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->title = 'Sedes';
?>

          <center><h2 class=titulo>Sedes disponibles</h2></center>


<?php foreach ($sede as $sede): ?>
  <div class="row3">
        <div id="columna" class="col-sm-8 col-md-4 active">
          <div class="thumbnail sede">
            <img src="../image/sede_<?=Html::encode("{$sede->ID}")?>.png" alt="..." style="width=50px">
            <div class="caption">
            <h4><?=Html::encode("{$sede->NOMBRE} ")?> </h4>
            <p><?=Html::encode("{$sede->LOCALIDAD}")?> -<?=Html::encode(" {$sede->CALLEYNUM} ")?></p>
            <p></p>
            <a href="../edificio/edifilter?id=<?=Html::encode("{$sede->ID}")?>" class="btn btn-info" role="button">Entrar</a>
            <a href="../sede/update?id=<?=Html::encode("{$sede->ID}")?>"  class="btn btn-primary" role="button">Modificar</a>
            </div>
          </div>
        </div>
  </div>
<?php endforeach;?>

<?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
<div id="sidebar" class="active">
  <div class="toggle-btn miBoton">
      <span>&#9776;</span>
  </div>
      <ul>
        <li><a href="../aula/buscador" class="btn miBoton btn-md btn-vistav " role="button">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <li>
        <a href="../sede/create" class="btn miBoton btn-md btn-vistav" role="button">Crear sede <span class="glyphicon glyphicon-plus"></span></a>
        </li>
        <li><a href="../comision/create" class="btn miBoton btn-md btn-vistav" role="button">Crear comisiones <span class="glyphicon glyphicon-plus"></span></a></li>
        <li><a href="../materia/create" class="btn miBoton btn-md btn-vistav" role="button">Crear materia <span class="glyphicon glyphicon-plus"></span></a></li>
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
