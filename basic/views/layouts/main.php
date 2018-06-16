<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
</head>

<body class="iniciocs" >

<?php $this->beginBody() ?>





<div class="wrap">



    <?php
    NavBar::begin([
        'brandLabel' => '<img src="../image/iconUnaj.jpg" height=30 width=30 ; class="img-responsive">'.'',]);
   
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                
                ['label' => 'Home', 'url' => ['/site/index']],
                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    NavBar::end();
    ?>
    <?php //NAV FIJO E INAMOBIBLE SEGUN ROL............
        if(Yii::$app->user->isGuest)
        {
            
        }
        else{
            if(User::isUserAdmin(Yii::$app->user->identity->id)) 
            {//---------------ADMIN PANEL-------------------
            ?>

            <div class="navbarsize">
            <nav class="navbar navbar-default">

  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
     <a href="../sede/vistav" class="btn btn-primary">Sedes</a>
     <a href="../instituto/institutov" class="btn btn-primary btn-info">Institutos</a>
     <a href="../admin/noti" class="btn btn-primary btn-success">Notificaciones</a>
     <a href="../site/register" class="btn btn-warning btn-md">Registrar Nuevo Usuario<i class="fa fa-sign-in"></i></a>

    <button class="btn btn-danger navbar-btn">Configuracion</button>
  </div>
</nav>
</div>
            <?php
        }
        if(User::isUserSimple(Yii::$app->user->identity->id))
        {//---------------ADMIN PANEL-------------------
            ?>
<div class="navbarsize">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">User Panel</a>
    </div>
     <a href="../sede/vistav" class="btn btn-primary">Sedes</a>
     <a href="../instituto/institutov" class="btn btn-primary btn-info">Institutos</a>
     <a href="../user/noti" class="btn btn-primary btn-success">Notificaciones</a>

    <button class="btn btn-danger navbar-btn">Configuracion</button>
  </div>
</nav>
</div>

            <?php
        }
    }
    ?>
    

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
       

        
    </div>
</div>



<?php $this->endBody() ?>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Proyecto de Software <?= date('Y') ?></p>
        <p class="pull-right"> Ingeniería Informatica </p>

    </div>
</footer>



</body>
</html>
<?php $this->endPage() ?>
