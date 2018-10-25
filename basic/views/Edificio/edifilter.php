<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  
], 'css-print-theme');

$this->title = 'Edificios disponibles';
?>
<br>
<br>
<a href="../edificio/create" class="btn btn-success d-flex justify-content-around btn-edificio0" role="button">Crear Edificio</a>



<center><h3 style="color:black;"><?php if(count($edificio) != 0){
echo("Edificios Disponibles en la sede "); echo (Html::encode("{$edificio[0]->sEDE->NOMBRE}"));}
else{?>

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">ATENCION!</h4>
  <p>NO HAY EDIFICIOS CREADOS EN ESTA SEDE</p>
  <hr>

  <a href="../edificio/create" class="btn btn-danger btn-md" role="button">CREA EDIFICIO</a>
</div>


<?php } ?></h3></center>








<ul>


<?php foreach ($edificio as $edificio): ?>

<div class="row3">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
      <img src="../image/edi4.png" alt="...">
      <div class="caption">
        <?= Html::encode("{$edificio->NOMBRE} ") ?>
        <br></br> 
         <img  src="../image/aulaicon.png" alt="  height="42" width="42"">
        <?= Html::encode("{$edificio->CANTIDAD_AULAS} ") ?>
        <p><a href="../aula/aulafilter?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-primary" role="button">Entrar</a> <a href="../edificio/update?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-default" role="button">Modificar</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>





</ul>

