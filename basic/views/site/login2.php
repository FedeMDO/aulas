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

/*Grid */ 
.grid-login{
    display:grid;
    margin:auto;
    width: 100%;
    height: 100vh;
    grid-template-columns: 75% 25%;  
}

.caja{
  position:relative;
}
/*Para hacerlo adaptable*/
@media only screen and (max-width: 768px) {

  #myCarousel{
    display:none;
  }
  .grid-login{
    grid-template-columns: 100%;
  }
  .slider{
    display:none;
  } 
}
/* que no se vea el navbar*/

.navbar{
  display:none;
}

.ingreso{
  padding: 57px;
  justify-self:end;
  
}



.control-label{
  display:none;
}

/*arregla algunas cosas de las formas de log*/
.col-sm-6{
  width:100% !important;
}

.col-sm-offset-3{
  margin:0px;
}

/*estilo del boton*/
.btnlog{
  border-radius: 35px;
  width: 200px;
  display:flex;
  justify-content:center;
  
}


/* no se vean los botones del carousel */

.carousel-control{
  display:none;
}

/* texto de error de captcha centrado*/

.help-block{
  text-align:center;
}

/* para centrar items en pantalla */

.centrado{
  display:flex; 
  justify-content:center;
}
</style>

<!--Corresponde al carousel ocupa 75% de la pantalla -->

<div class="grid-login">

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
      <img src="../image/banner_site0.png" alt="Los Angeles" style="height:100vh; width:100%;" >
      
    </div>

    <div class="item">
      <img src="../image/banner_site2.png" alt="Chicago" style="height:100vh; width:100%;">
    </div>

    <div class="item">
      <img src="../image/banner_site3.png" alt="New York" style="height:100vh; width:100%;">
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


<!-- Corresponde al login ocupa 25% de la pantalla -->

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

      <div class="centrado">
        <a href="/site/recoverpass" style="color:black">¿Olvidaste tu contraseña?</a>
      </div>

      <div class="centrado">
        <?= $form->field($model, 'rememberMe', ['labelOptions'=>['style'=>'text-align:center']] )->checkbox([
        ])->label('Recordarme') ?>
      </div>
      
      <div class="centrado">
        <?= Html::submitButton('Ingresar', ['class' => 'btn btn-success btnlog btn-lg', 'name' => 'login-button']) ?>
      </div>

  <?php ActiveForm::end(); ?>
    </div>

</div>

  
   
    
