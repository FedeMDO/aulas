<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');

$this->title = 'Sedes';
?>
<!--
<div class="col-md-offset-4 col-md-5">
  <a href="../sede/create" class="btn btn-success btn-md" role="button">Crear Sede</a>
  <a href="../aula/buscador" class="btn btn-primary btn-md" role="button">Buscar aulas</a>
</div>
-->
 <!--
<div class="btn-group">
  <a href="../sede/create" class="btn btn-success btn-md" role="button">Crear Sede</a>
  <a href="../aula/buscador" class="btn btn-primary btn-md" role="button">Buscar aulas</a>
</div>
-->

<div class="botones">
  <button class="button button1" role="button"><a href="../sede/create">Crear Sede</a></button>
  <button class="button button2" role="button"><a href="../aula/buscador">Buscar Aula</a></button>
</div>

  <center><h3>Sedes Disponibles</h3></center>

<ul>



<?php foreach ($sede as $sede): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/sede_<?= Html::encode("{$sede->ID}") ?>.png" alt="...">
      <div class="caption">
        <?= Html::encode("{$sede->NOMBRE} ") ?>
        <br>
        <?= Html::encode(" {$sede->CALLEYNUM} ") ?>
        
        <?= Html::encode("{$sede->LOCALIDAD}") ?>
        <p><a href="../edificio/edifilter?id=<?= Html::encode("{$sede->ID}") ?>" class="btn btn-primary" role="button">Entrar</a> 
        <a href="../sede/update?id=<?= Html::encode("{$sede->ID}") ?>"  class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


</ul>
<div class=""><?= LinkPager::widget(['pagination' => $pagination]) ?></div>
