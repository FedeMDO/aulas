<?php

/* @var $this yii\web\View */


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


$this->title = 'My Yii Application';



?>




<div class="site-index">

    <div class="jumbotron">
    <h1 style="font-size:8vw;">Aulas Unaj V1</h1>
<p style="font-size:2vw;">Sistema de Gestion de Aulas</p>
        
    </div>


</div>




