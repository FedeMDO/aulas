<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>
<a href="../sede/create" class="btn btn-success btn-md" role="button">Crear Nueva Sede</a>

  <center><h3>Sedes Disponibles</h3></center>




<ul>



<?php foreach ($sede as $sede): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/sede_<?= Html::encode("{$sede->ID}") ?>.png" alt="...">
      <div class="caption">
        <?= Html::encode("{$sede->NOMBRE} ") ?>
        <br></br>
        <?= Html::encode(" {$sede->CALLEYNUM} ") ?>
        
        <?= Html::encode("{$sede->LOCALIDAD}") ?>
        <p><a href="../edificio?EdificioSearch[ID_SEDE]=<?= Html::encode("{$sede->ID}") ?>&EdificioSearch[CANTIDAD_AULAS]=" class="btn btn-primary" role="button">Entrar</a> 
        <a href="../sede/update?id=<?= Html::encode("{$sede->ID}") ?>"  class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>



</ul>




<?= LinkPager::widget(['pagination' => $pagination]) ?>
