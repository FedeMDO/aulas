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
      height: 380px;
      background: #ff0;
      margin: 10px;
      box-sizing: border-box;
      display: inline-block;
      overflow: hidden;
    }

    .containter .box .imgBox{
      position: relative;
    }

    .container .box .imgBox img{
      max-width: 100%;
      height:380px;
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
    }

    .container .box:hover .details{
      transform: scaleY(1);
    }

    .container .box .details .content{
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
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
                <h4><?=Html::encode("{$sede->NOMBRE} ")?> </h4>
                <p><?=Html::encode("{$sede->LOCALIDAD}")?> -<?=Html::encode(" {$sede->CALLEYNUM} ")?></p>
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

</body>
</html>




