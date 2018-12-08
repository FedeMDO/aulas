<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->registerCssFile(
    "@web/css/inicio.css",
    [
        'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    ],
    'css-print-theme'
);


$this->title = 'Genio';
?>
<div class='jumbotron2'>

<H1>Genio, grosos sos un  Admin</H1>
<a href= "user" >aaaaaaaaaa</href>
<a href="admin" >BBBBBBBBBBBBBBBBBBB</href>
<a href="aula" >CCCCC</href>
</div>

