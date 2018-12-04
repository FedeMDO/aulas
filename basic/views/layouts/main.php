<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;


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
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
</head>

<body class="iniciocs" >

<?php $this->beginBody() ?>

<style>
.navlog > li:nth-child(1) > a:nth-child(1){
    padding-bottom: 16px
}
</style>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="../image/logo3.png"; class="img-responsive">'.'',
        "innerContainerOptions" => ['class' => 'container-fluid']]);
        
        // Preguntar aca si user es admin o simple y hacer un echo Nav del q corresponda
        // SI ES GUEST
        if(Yii::$app->user->isGuest)
        {
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-right navlog'],
            'items' => [
                
                ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-home']).' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                
                Yii::$app->user->isGuest ? (
                    ['label' => Html::button('<i class="glyphicon glyphicon-log-in"></i> INGRESAR', ['value' => Url::to('/site/login2'), 'class' => 'btn btn-add-al', 'id' => 'modalLogin', 'style' => 'padding: 0px; font-weight: bold; background-color: Transparent; ;border-bottom-width: 0px;border-top-width: 0px;']) ]
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
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-home']).' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' SEDES', 'url' => ['/sede/vistav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' INSTITUTOS', 'url' => ['/instituto/institutov'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' CARRERAS', 'url' => ['/carrera/carrerav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' ADMINISTRACION', 'url' => ['/site/register'], 'options' => ['style' => 'font-weight: bold;'],

                    'items' => [
                    ['label' => '<span></span> Registrar usuario', 'url' => '/site/register'],
                    ['label' => '<span> Panel de administracion', 'url' => '/admin/panel'],
                    ['label' => '<span> Gestionar usuarios', 'url' => '/admin/users',],
                            ],
                        ]                  
                ],
            ]);
        


            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class'=>'fa fa-bell']).' NOTIFICACIONES', 'url' => ['/site/noti'], 'options' => ['style' => 'font-weight: bold;']],
                    Yii::$app->user->isGuest ? (
                        ['label' => Html::button('<i class="glyphicon glyphicon-log-in"></i> INGRESAR', ['value' => Url::to('/site/login2'), 'class' => 'btn btn-add-al', 'id' => 'modalLogin', 'style' => 'position:relative; top:-8px; font-weight: bold; background-color: Transparent;']) ]
                    ) : 
                    ['label' =>  Yii::$app->user->identity->username, 'options' => ['style' => 'font-weight: bold;'],
                    'items' => [
                    ['label' => '<span class="fa fa-key"></span> Cambiar contraseña', 'url' => '/user/changepw'],
                    ['label' => '<span class="fa fa-book"> Manual de usuario', 'url' => '/site/manual'],
                    ['label' => '<span class="fa fa-info-circle"> Acerca de...', 'url' => '/site/about',],
                    ['label' =>'<span class="fa fa-sign-out"></span> Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                            ],
                        ]                  
                ],
            ]);
        }
         //si es user
        if(User::isUserSimple(Yii::$app->user->identity->id))
        {
            echo Nav::widget([
                'encodeLabels' => false, //Esto permite poner los iconos
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-home']).' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' SEDES', 'url' => ['/sede/vistav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' INSTITUTOS', 'url' => ['/instituto/institutov'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' CARRERAS', 'url' => ['/carrera/carrerav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' CREAR COMISION', 'url' => ['/comision/create'], 'options' => ['style' => 'font-weight: bold;']],
                ],
            ]);
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class'=>'fa fa-bell']).' NOTIFICACIONES', 'url' => ['/site/noti'], 'options' => ['style' => 'font-weight: bold;']],
                    Yii::$app->user->isGuest ? (
                        ['label' => Html::button('<i class="glyphicon glyphicon-log-in"></i> INGRESAR', ['value' => Url::to('/site/login2'), 'class' => 'btn btn-add-al', 'id' => 'modalLogin', 'style' => 'position:relative; top:-8px; font-weight: bold; background-color: Transparent;']) ]
                    ) : 
                    ['label' =>  Yii::$app->user->identity->username, 'options' => ['style' => 'font-weight: bold;'],
                    'items' => [
                    ['label' => '<span class="fa fa-key"></span> Cambiar contraseña', 'url' => '/user/changepw'],
                    ['label' => '<span class="fa fa-book"> Manual de usuario', 'url' => '/site/manual'],
                    ['label' => '<span class="fa fa-info-circle"> Acerca de...', 'url' => '/site/about',],
                    ['label' =>'<span class="fa fa-sign-out"></span> Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                            ],
                        ]                  
                ],
            ]);
        }
        if(User::isUserGuest(Yii::$app->user->identity->id))
        {
            echo Nav::widget([
                'encodeLabels' => false, //Esto permite poner los iconos
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-home']).' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' SEDES', 'url' => ['/sede/vistav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' INSTITUTOS', 'url' => ['/instituto/institutov'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class'=>'glyphicon glyphicon-chevron-right']).' CARRERAS', 'url' => ['/carrera/carrerav'], 'options' => ['style' => 'font-weight: bold;']],
                ],
            ]);
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class'=>'fa fa-bell']).' NOTIFICACIONES', 'url' => ['/site/noti'], 'options' => ['style' => 'font-weight: bold;']],
                    Yii::$app->user->isGuest ? (
                        ['label' => Html::button('<i class="glyphicon glyphicon-log-in"></i> INGRESAR', ['value' => Url::to('/site/login2'), 'class' => 'btn btn-add-al', 'id' => 'modalLogin', 'style' => 'position:relative; top:-8px; font-weight: bold; background-color: Transparent;']) ]
                    ) : 
                    ['label' =>  Yii::$app->user->identity->username, 'options' => ['style' => 'font-weight: bold;'],
                    'items' => [
                    ['label' => '<span class="fa fa-key"></span> Cambiar contraseña', 'url' => '/user/changepw'],
                    ['label' => '<span class="fa fa-book"> Manual de usuario', 'url' => '/site/manual'],
                    ['label' => '<span class="fa fa-info-circle"> Acerca de...', 'url' => '/site/about',],
                    ['label' =>'<span class="fa fa-sign-out"></span> Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                            ],
                        ]                  
                ],
            ]);
            
        }
    }
    NavBar::end();
    ?>


    <!-- SLIDER -->
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>


</div>
<!-- footer comentado -->
<!-- <div class="footer">
  <p>Proyecto de Software - Universidad Nacional Arturo Jauretche</p>
</div> -->




    <?php
        yii\bootstrap\Modal::begin([
            'headerOptions' => ['id' => 'modalRestriHeader'],
            'id' => 'modalRestri',
            'size' => 'modal-md',
            'clientOptions' => ['backdrop' => True, 'keyboard' => True]
        ]);        echo "<div id='modalRestriContent'></div>";
        yii\bootstrap\Modal::end();
    ?>

    <style>

    .log-modal-content
{
    border-radius: 25px;
    -webkit-border-radius: 25px;
    -moz-border-radius: 25px;
    background-color: rgb(41, 128, 185);
    padding-bottom:20px;
}

.log-modal-content p{
    color:white;
}

.log-modal-header
{
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    -webkit-border-top-left-radius: 25px;
    -webkit-border-top-right-radius: 25px;
    -moz-border-radius-topleft: 25px;
    -moz-border-radius-topright: 25px;
    background-color: rgb(41, 128, 185);
    padding-bottom:0px;
}

.modal-log{
        width:500px;
    }

@media screen and (max-width: 850px) {
    .modal-log{
        width:auto;
    }
 
  
}
    </style>


    
    <!-- Modal login -->
    <div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog modal-md modal-log">
    
      <!-- Modal content login-->
      <div class="modal-content log-modal-content">
        <div class="modal-header log-modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title" style="text-align:center;color:white;">Bienvenido</h1>
        </div>
        <div  id='modalContent' class="modal-cuerpo">
            </div>
        </div>
      </div>
    </div>
  </div>
     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informacion del evento</h4>
        </div>
        <div class="modal-cuerpo">
            <input type="hidden" id="idevento" name="idevento" value="">
            Comision:
            <div class="well well-sm weell">
                <p id="showcomision"></p>
            </div>
            Inicio:
            <div class="well well-sm weell">
                <p id="showini"></p>
            </div>
            Fin:
            <div class="well well-sm weell">
                <p id="showfin"></p>
            </div>
            Ultimo usuario que modifico:
            <div class="well well-sm weell">
                <p id="showusermodifico"></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" id="btnBorrarEvento">Borrar</button>
        </div>
      </div>
    </div>
  </div>

<?php $this->endBody() ?>



</body>



</html>

<?php $this->endPage() ?>

