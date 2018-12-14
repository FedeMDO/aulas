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
use kartik\sidenav\SideNav;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '../image/favicon_unaj.png']);


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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
</head>

<body class="iniciocs" >

<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="../image/logo3.png"; class="img-responsive">' . '',
        "innerContainerOptions" => ['class' => 'container-fluid']
    ]);
        // Preguntar aca si user es admin o simple y hacer un echo Nav del q corresponda
        // SI ES GUEST
        //SI ES ADMIN
    if (User::isUserAdmin(Yii::$app->user->identity->id)) {
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-default'],
            'items' => [
                ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-home']) . ' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' SEDES', 'url' => ['/sede/vistav'], 'options' => ['style' => 'font-weight: bold;']],
                ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' INSTITUTOS', 'url' => ['/instituto/institutov'], 'options' => ['style' => 'font-weight: bold;']],
                ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' CARRERAS', 'url' => ['/carrera/carrerav'], 'options' => ['style' => 'font-weight: bold;']],
                [
                    'label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' ADMINISTRACION', 'url' => ['/site/register'], 'options' => ['style' => 'font-weight: bold;'],

                    'items' => [
                        ['label' => '<span></span> Registrar usuario', 'url' => '/site/register'],
                        ['label' => '<span> Panel de administracion', 'url' => '/admin/panel'],
                        ['label' => '<span> Gestionar usuarios', 'url' => '/admin/users', ],
                    ],
                ]
            ],
        ]);



        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => Html::tag('span', '', ['class' => 'fa fa-bell']) . ' NOTIFICACIONES', 'url' => ['/site/noti'], 'options' => ['style' => 'font-weight: bold;']],
                Yii::$app->user->isGuest ? (['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-log-in']) . ' LOGIN', 'url' => ['/site/login'], 'options' => ['style' => 'font-weight: bold;']]) :
                    [
                    'label' => Yii::$app->user->identity->username, 'options' => ['style' => 'font-weight: bold;'],
                    'items' => [
                        ['label' => '<span class="fa fa-key"></span> Cambiar contraseña', 'url' => '/user/changepw'],
                        ['label' => '<span class="fa fa-book"> Manual de usuario', 'url' => '/site/manual'],
                        ['label' => '<span class="fa fa-info-circle"> Acerca de...', 'url' => '/site/about', ],
                        ['label' => '<span class="fa fa-sign-out"></span> Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ],
                ]
            ],
        ]);
    }
    NavBar::end();
    ?>
    <div class='col-md-2' style="padding-left:0px; padding-right:0px;" >
    <div class='col-md-7' style="padding-left:0px; padding-right:0px;" >
    <?php
    echo SideNav::widget([
        'encodeLabels' => false,
        'type' => SideNav::TYPE_PRIMARY,
        'heading' => false,
        'items' => [

            ['label' => 'Panel de aulas', 'url' => '/aula/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de carreras', 'url' => '/carrera/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de comisiones', 'url' => '/comision/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de edificios', 'url' => '/edificio/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de institutos', 'url' => '/instituto/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de materias', 'url' => '/materia/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de notificaciones', 'url' => '/notificacion/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de recursos', 'url' => '/recurso/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
            ['label' => 'Panel de sedes', 'url' => '/sede/index', 'icon' => 'glyphicon glyphicon-chevron-right'],
        ],
    ]);
    ?>
    </div>
    </div>
    
    <!-- SLIDER -->
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
        <?= Alert::widget() ?>
        <div class='col-md-10'>
        <div class='col-md-11'>
        <?= $content ?>
        
        </div>
</div>



<?php $this->endBody() ?>



</body>
<!-- footer comentado -->
<footer>
  <p>Proyecto de Software - Universidad Nacional Arturo Jauretche</p>
</footer>


</html>

<?php $this->endPage() ?>

