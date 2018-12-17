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

<style>
.navlog > li:nth-child(1) > a:nth-child(1){
    padding-bottom: 16px
}
li.dropdown:nth-child(2) > a:nth-child(1){
    padding-bottom:5px !important;
}
.navDerecha p{
    margin-bottom:0px;

}
#sidebar ul li a {
    text-align:left;
}

@media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #sidebarCollapse span {
                display: none;
            }
        }
</style>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="../image/logo3.png"; class="img-responsive">' . '',
        "innerContainerOptions" => ['class' => 'container-fluid']
    ]);
        // Preguntar aca si user es admin o simple y hacer un echo Nav del q corresponda
        // SI ES GUEST
        //SI ES ADMIN

     // cambia la foto de acuerdo si tiene o no imagen cargada//
     if (Yii::$app->user->identity->profile_picture == ''){
        $urlImagen= "../image/admin_icon.png";
    }
    else{
    $urlImagen = Yii::$app->user->identity->profile_picture;
    }
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
                        'label' => '<img class= "imagenPerfil" src=' . $urlImagen .'><span style="margin-botom:0px; bottom:3px; position: relative; margin-left:4px">' . Yii::$app->user->identity->username .'</sman> ', 'options' => ['style' => 'font-weight: bold;'],
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-user"></span> Cuenta', 'url' =>'/user/updateprofile?id=' . Yii::$app->user->identity->id],
                            ['label' => '<span class="fa fa-lock"></span> Cambiar contraseña', 'url' => '/user/changepw'],
                            ['label' => '<span class="fa fa-book"></span> Manual de usuario', 'url' => '/site/manual'],
                            ['label' => '<span class="fa fa-info-circle"></span> Acerca de...', 'url' => '/site/about', ],
                            ['label' => '<span class="fa fa-sign-out"></span> Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ],
                ]
            ],
        ]);
    }
    NavBar::end();
    ?>
        <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" style= "border-bottom:1px solid #47748b">
                <h3 style="text-align:center">Panel de administracion</h3>
            </div>

            <ul class="list-unstyled components">
                <li><a href='/aula/index'><i class = "glyphicon glyphicon-chevron-right"></i> Panel de aulas</a></li>
                <li><a href="/carrera/index"><i class = "glyphicon glyphicon-chevron-right"></i> Panel de carreras</a></li>
                <li><a href="/comision/index"><i class = "glyphicon glyphicon-chevron-right"></i> Panel de comisiones</a></li>
                <li><a href='/edificio/index'><i class = "glyphicon glyphicon-chevron-right"></i> Panel de edificios</a></li>
                <li><a href='/instituto/index'><i class = "glyphicon glyphicon-chevron-right"></i> Panel de institutos</a></li>
                <li><a href='/materia/index'><i class = "glyphicon glyphicon-chevron-right"></i> Panel de materias</a></li>
                <li><a href='/notificacion/index'><i class = "glyphicon glyphicon-chevron-right"></i> Panel de notificaciones</a></li>
                <li><a href='/recurso/index'><i class = "glyphicon glyphicon-chevron-right"></i> Panel de recursos</a></li>
                <li><a href='/sede/index'><i class = "glyphicon glyphicon-chevron-right"></i> Panel de sedes</a></li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li><a href="/admin/panel" class="download" style="text-align:center">Estadisticas</a></li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="glyphicon glyphicon-align-justify"></i><span></span></button>
            <?= $content ?>
</div>
</div>



  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


<?php $this->endBody() ?>



</body>
<!-- footer comentado -->
<footer>
  <p>Proyecto de Software - Universidad Nacional Arturo Jauretche</p>
</footer>


</html>

<?php $this->endPage() ?>

