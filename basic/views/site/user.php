<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->registerCssFile("@web/css/inicio.css", 
[
    'depends' => [\yii\bootstrap\BootstrapAsset::className()
]
    ,
], 'css-print-theme');

    
$this->title = 'pobre';
?>
<div class='jumbotron2' >

<H1>Solo eres un pobre y simple user</H1>
<a href= "user" >aaaaaaaaaa</href>
<a href="admin" >BBBBBBBBBBBBBBBBBBB</href>
<a href="views/aula" >CCCCC</href>

</div>

