<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Ingresar';
//$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
]);

?>

<style>

.grid{
    display:grid;
    margin:auto;
    width: 100%;
    height: 100vh;
    grid-template-columns: 75% 25%;  
}

@media only screen and (max-width: 768px) {

  #myCarousel{
    display:none;
  }
  .grid{
    grid-template-columns: 100%;
  }
  .slider{
    display:none;
  } 
}

.navbar{
  display:none;
}

.ingreso{
  padding: 57px;
  justify-self:center;
}

.control-label{
  display:none;
}

.col-sm-6{
  width:100% !important;
}

.col-sm-offset-3{
  margin:0px;
}

.btnlog{
  border-radius: 35px;
  width: 200px;
  display:flex;
  justify-content:center;
  
}

.caja{
  position:relative;
}
</style>

<div class="grid">
    <div class="caja slider">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:100vh">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="../image/banner_site1.png" alt="Los Angeles" style=height:100vh>
    </div>

    <div class="item">
      <img src="../image/banner_site2.png" alt="Chicago" style=height:100vh>
    </div>

    <div class="item">
      <img src="../image/banner_site3.png" alt="New York" style=height:100vh>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="caja ingreso" style="background-color:white" >
    <h1 style=padding-bottom:20px;>Por favor complete los siguientes campos:</h1>
  
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
    ]); ?>
     <?= $form->field($model, 'username', ['labelOptions'=>['style'=>'color:white'],'inputTemplate' => '<div class="input-group input-group-lg"><span class="input-group-addon"><i class="fa fa-user"></i></span>{input}</div>'
])->textInput(['placeholder' => "Usuario o E-mail"])->label('') ?>

      <?= $form->field($model, 'password', ['labelOptions'=>['style'=>''],'inputTemplate' => '<div class="input-group input-group-lg"><span class="input-group-addon "><i class="fa fa-lock"></i></span>{input}</div>'] )->passwordInput( ['placeholder' => "Ingresa tu contraseña"])->label(null) ?>
      <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label('') ?>
      <div class="boton" style="display:flex; justify-content:center">
      <a href="/site/recoverpass" style="text-align:center">¿Olvidaste tu contraseña?</a>
      </div>
       <div class="boton" style="display:flex; justify-content:center">
      <?= $form->field($model, 'rememberMe', ['labelOptions'=>['style'=>'text-align:center']] )->checkbox([
      ])->label('Recordarme') ?>
      </div>
      <div class="boton" style="display:flex; justify-content:center">
      <?= Html::submitButton('Ingresar', ['class' => 'btn btn-success btnlog btn-lg', 'name' => 'login-button']) ?>
      </div>

  <?php ActiveForm::end(); ?>
    </div>

</div>

  
   
    
