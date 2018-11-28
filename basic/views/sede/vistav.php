<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->registerCssFile("@web/css/index.css", [
	'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->title = 'Sedes';
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

    h2{
      font-family: 'Dancing Script', cursive;
      font-size: 40px;
      text-align: center;
    }

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

    .container .box{
      position: relative;
      width: 400px;
      height: 236px;
      background: #ff0;
      margin: 5px;
      box-sizing: border-box;
      display: inline-block;
      overflow: hidden;
    }

    .containter .box .imgBox{
      position: relative;
    }

    .container .box .imgBox img{
      max-width: 100%;
      height: 236px;
      transition: transform 2s;
    }

    .container .box:hover .imgBox img{
      transform: scale(1.2);
    }

    .container .box .details{
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

    .container .box:hover .details{
      transform: scaleY(1);
    }

    .container .box .details .content{
      text-align: center;
      padding: 15px;
      color: #fff;
    }

  </style>

</head>
<body>
  <h2 class=titulo>Sedes Disponibles</h2>
  
  <div class="container">
    
    <?php foreach ($sede as $sede): ?>
        
      <div class="box">
          
        <div class="imgBox">
          <img src="../image/sede_<?=Html::encode("{$sede->ID}")?>.png">
        </div>

        <div class="details">

          <div class="content">

            <div class="thumbnail sede">
              <div class="caption">
                <h4 style="text-align:center;"><?=Html::encode("{$sede->NOMBRE} ")?> </h4>
                <p><?=Html::encode("{$sede->CALLEYNUM}")?> -<?=Html::encode(" {$sede->LOCALIDAD} ")?></p>
                <p></p>
                <a href="../edificio/edifilter?id=<?=Html::encode("{$sede->ID}")?>" class="btn btn-info" role="button">Entrar</a>
                <?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
                  <a href="../sede/update?id=<?=Html::encode("{$sede->ID}")?>"  class="btn btn-primary" role="button">Modificar</a>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>

      </div>

    <?php endforeach;?>

  </div>

  <div id="sidebar" class="active">
  <div class="toggle-btn miBoton">
      <span>&#9776;</span>
  </div>
      <ul>
        <li><a href="../aula/buscador" class="btn miBoton btn-md btn-vistav " role="button">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a>
        </li>
        <?php if(app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
        <li>
        <a href="../sede/create" class="btn miBoton btn-md btn-vistav" role="button">Crear sede <span class="glyphicon glyphicon-plus"></span></a>
        </li>
        <li><a href="../comision/create" class="btn miBoton btn-md btn-vistav" role="button">Crear comisiones <span class="glyphicon glyphicon-plus"></span></a></li>
        <li><a href="../materia/create" class="btn miBoton btn-md btn-vistav" role="button">Crear materia <span class="glyphicon glyphicon-plus"></span></a></li>
        <?php endif; ?>
      </ul>
  </div>

</body>
</html>

