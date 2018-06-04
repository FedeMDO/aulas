<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>



<h3>Sedes</h3>

<ul>



<?php foreach ($sede as $sede): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/sede_generic.jpg" alt="...">
      <div class="caption">
        <?= Html::encode("{$sede->NOMBRE} ") ?>
        <br></br>
        <?= Html::encode(" {$sede->CALLEYNUM} ") ?>
        
        <?= Html::encode("{$sede->LOCALIDAD}") ?>
        <p><a href="#" class="btn btn-primary" role="button">Entrar</a> <a href="../sede/update?id=2" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>



</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
