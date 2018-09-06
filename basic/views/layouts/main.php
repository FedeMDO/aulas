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
        // Preguntar aca si user es admin o simple y hacer un echo Nav del q corresponda
        // SI ES GUEST
        if(Yii::$app->user->isGuest)
        {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                
                ['label' => 'Home', 'url' => ['/site/index']],
                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        }
        else
        {
                    //SI ES ADMIN
        if(User::isUserAdmin(Yii::$app->user->identity->id)) 
        {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Sedes', 'url' => ['/sede/vistav']],
                    ['label' => 'Institutos', 'url' => ['/instituto/institutov']],
                    ['label' => 'Notificaciones', 'url' => ['/admin/noti']],
                    ['label' => 'Registrar nuevo usuario', 'url' => ['/site/register']],
                    ['label' => 'Configuracion', 'url' => ['#']],

                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
        }
    //si es user
    if(User::isUserSimple(Yii::$app->user->identity->id))
        {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Sedes', 'url' => ['/sede/vistav']],
                    ['label' => 'Institutos', 'url' => ['/instituto/institutov']],
                    ['label' => 'Notificaciones', 'url' => ['/admin/noti']],
                    ['label' => 'Crear Comision', 'url' => ['/comision/create']],
                    ['label' => 'Configuracion', 'url' => ['#']],

                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
        }
        }

    NavBar::end();
    ?>
    <!-- SLIDER -->
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
       

        
    </div>
</div>
<!-- footer comentado -->
<!-- <div class="footer">
  <p>Proyecto de Software - Universidad Nacional Arturo Jauretche</p>
</div> -->

<?php $this->endBody() ?>






</body>



</html>
<?php $this->endPage() ?>

