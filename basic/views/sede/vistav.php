<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->registerCssFile("@web/css/index.css", [
	'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->title = 'Sedes';
?>

          <center><h3>Sedes Disponibles</h3></center>


<?php foreach ($sede as $sede): ?>
  <div class="row3">
        <div id="columna" class="col-sm-8 col-md-4 active">
          <div class="thumbnail">
            <img src="../image/sede_<?=Html::encode("{$sede->ID}")?>.png" alt="...">
            <div class="caption">
              <?=Html::encode("{$sede->NOMBRE} ")?>
              <br></br>
              <?=Html::encode(" {$sede->CALLEYNUM} ")?>
              <?=Html::encode("{$sede->LOCALIDAD}")?>
              <p><a href="../edificio/edifilter?id=<?=Html::encode("{$sede->ID}")?>" class="btn btn-primary" role="button">Entrar</a>
              <a href="../sede/update?id=<?=Html::encode("{$sede->ID}")?>"  class="btn btn-default" role="button">Modificar</a></p>
            </div>
          </div>
        </div>
  </div>
<?php endforeach;?>

<div id="sidebar" class="active">
  <div class="toggle-btn">
      <span>&#9776;</span>
  </div>
      <ul>
        <li>
        <a href="../sede/create" class="btn miBoton btn-md btn-vistav" role="button">Crear Sede</a>
        </li>
        <li><a href="../aula/buscador" class="btn miBoton btn-md btn-vistav" role="button">Filtar Aulas</a>
        </li>
      </ul>
</div>


<div class=""><?=LinkPager::widget(['pagination' => $pagination])?></div>
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
