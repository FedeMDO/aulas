<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Acerca de nosotros';

?>

<style>


/*Acerca de*/
.site-about img{
  max-width: 100%;
}

.blacktopline{
  height: 20px;
  background-color:black;
  margin-top: 20px;
  margin-bottom: 20px;
}
#datacontenido{
  margin: 0 auto;
}
.namenews{
  font-size: 14vh;
  margin: 0 auto;
  width: 100%;
  text-align:center;
  font-family: 'Tangerine', cursive;
  color:#000000;
}
.datanews{
  height: 40px;
  border: solid 1px gray;
  width:100%;
  margin: 0 auto;
  margin-bottom: 20px;
  text-align: center;
}
.datanews ul{
  width: 100%;
  margin-left:-40px;
}
.datanews ul li {
  display: inline-flex;
  margin: 0 auto;
  padding: 10px;
}

.titleplana{
  margin: 0 auto;
  text-align:center;
  width:100%;
  text-transform: uppercase;
  font-size: 6.4vh;
  margin-bottom:10px;
}

.body-contnent1{
  width:100%;
  display:block;
  margin-left:25%;
}
.body-contnent2{
  width:100%;
  display:block;
  margin-left:27%;
}

.div-col4{
  width: 33.33%;
  display:inline-flex;
  padding:10px;
}
.div-col3{
  width:25%;
  display:inline-flex;
  padding:10px;
}




</style>
<div class="col-md-offset-2 col-md-8 content">
<div class="loginc" style="margin-top:0px; border-radius:0px;  height:100%; padding:0px;">
<div class="box-body">
<div class="site-about">
    <img width="1500px" height="348" src="../image/teamwork.jpg" />
    <style>
    @import 'https://fonts.googleapis.com/css?family=Tangerine';
    </style>
    <header>
    <div class='blacktopline'></div>
    <div class='datanews'>
    <ul id='datacontenido'>
      <li style='float:left'>Universidad Nacional Arturo Jaureche</li>
      <li style='float:right'>-Desde 2018-</li>
    </ul>
  </div>
    <h1 class='namenews'>Acerca de nosotros</h1>
    </header>
  <aside class='body-contnent1'>
    <div class='div-col3'>
      <div>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere excepturi eligendi tenetur obcaecati aliquid. Voluptatum labore excepturi doloremque adipisci modi non numquam dolorum asperiores quisquam perspiciatis iure
        </p> 
      </div>
    </div>
    <div class='div-col4'>
      <p>
       Ullam consectetur perferendis ipsa eos repudiandae, possimus amet rem, odio enim accusantium cum nobis voluptatibus consequuntur tempora fugiat. In culpa rerum, asperiores ullam nihil blanditiis aliquam molestias fuga voluptatem accusamus.
        <br />
        <br />
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates.
      </p>
    </div>
    </div>
    <h1 class='namenews'>Integrantes del equipo</h1>
    <h4 style="text-align:center">Docente a cargo Ing. Óscar Cortés Bracho</h4>
    </header>
  <aside class='body-contnent2'>
  <div class='div-col3'>
      <div>
        <p style>Integrantes 1er cuatrimestre:</p>
        <p> - Gustavo Albornoz<br> - Gabriel Benítez<br> - Lucas Granata<br> - Nicolás Lescano<br> - Federico Montes de Oca<br> - Cristian Pinto<br> - Iván Zapata
        </p>
      </div>
    </div>
    <div class='div-col4'>
      <p>
        Integrantes 2do cuatrimestre:
        <br><br>
        - Lucas Granata<br> - Gabriel Méndez<br> - Leandro Perez<br> - Braian Pezet<br> - Juan Piñeiro<br> - Emanuel Righi<br> - Iván Zapata.
      </p>
    </div>
    </div>
  </aside>
    </p>
</div>
</div>
</div>
</div>