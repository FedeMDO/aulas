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



<!doctype <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Sedes</title>
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Indie+Flower|Lato" rel="stylesheet">
  <script src="main.js"></script>

   <style>


h4{
  text-align: center;
}

body{
  margin:0;
  padding:0;
  font-family: sans-serif;
}

.container{
  width: 1290px;
  min-height: 500px;
  margin: 10px auto 0;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}

 .box{
  position: relative;
  background: #ff0;
  margin: 5px;
  box-sizing: border-box;
  display: inline-block;
  overflow: hidden;
}

 .box .imgBox{
  position: relative;
}

 .box .imgBox img{
  max-width: 100%;
  transition: transform 2s;
}

 .box:hover .imgBox img{
  transform: scale(1.2);
}

.box .details{
  position: absolute;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  background: rgba(0,0,0,0.8);
  transform: scaleY(0);
  transition: transform .5s;
  display: flex;
  justify-content: center;
  align-items: center;
}

 .box:hover .details{
  transform: scaleY(1);
}

 .box .details .content{
  text-align: center;
  padding: 15px;
  color: #fff;
}

</style>
</head>
<body>
  <h2 class=titulo><?php if (count($edificio) != 0) {
                    echo ("Edificios Disponibles en la sede ");
                    echo (Html::encode("{$edificio[0]->sEDE->NOMBRE}"));
                  } else {
                  } ?>
  </h2>
    <?php foreach ($edificio as $edificio) : ?>
    <div class="row3">
        <div id="columna" class="col-sm-8 col-md-4 active">
      <div class="box">
          
        <div class="imgBox">
          <img src="../image/edi4.png" alt="...">
        </div>

        <div class="details">

          <div class="content" style=>

            <div class="thumbnail sede">
              <div class="caption">
                <h4 style="text-align:center;"><?= Html::encode("{$edificio->NOMBRE} ") ?></h4>
                <img  src="../image/aulaicon.png" alt="  height="50" width="50">
                <?= Html::encode("{$edificio->CANTIDAD_AULAS} ") ?>
                <p></p>
                <a href="../aula/aulafilter?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-info" role="button">Entrar</a>
                <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                  <a href="../edificio/update?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-primary" role="button">Modificar</a>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
        </div>
        </div>

      </div>

    <?php endforeach; ?>



  <div id="sidebar" class="active">
  <div class="toggle-btn miBoton">
      <span>&#9776;</span>
  </div>
      <ul>
      <li><a href="../aula/buscador" class="btn miBoton btn-md btn-vistav " role="button">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <li>
        <a href="../edificio/scheduler?id_sede=<?= Html::encode("{$edificio->sEDE->ID}") ?>" class="btn miBoton btn-md btn-vistav" role="button">Ver eventos por edificio <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
        <li>
        <a href="../edificio/create" class="btn miBoton btn-md btn-vistav" role="button">Crear edificio <span class="glyphicon glyphicon-plus"></span></a>
        </li>
        <li>
        <a href="../edificio/restrischeduler?id_sede=<?= Html::encode("{$edificio->sEDE->ID}") ?>" class="btn miBoton btn-md btn-vistav" role="button">Restricciones edificios <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <?php endif; ?>
      </ul>
  </div>

</body>
</html>

