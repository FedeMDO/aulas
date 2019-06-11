<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\models\Notificacion;
use app\models\CicloLectivo;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '../image/favicon_unaj.png']);


AppAsset::register($this);


$ciclos = CicloLectivo::find()->where(['estado' => 'Abierto'])->asArray()->all();
$resultCiclos = ArrayHelper::map($ciclos, 'id', 'nombre');
$session = Yii::$app->session;
if ($session->get('cicloID') == null && sizeof($resultCiclos) > 0){
    $session->set('cicloID', array_keys($resultCiclos)[0]);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
li.dropdown:nth-child(3) > a:nth-child(1){
    padding-bottom:5px !important;
}
li.dropdown:nth-child(2) > a:nth-child(1){
    padding-bottom:5px !important;
}
.navDerecha p{
    margin-bottom:0px;

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
        if(Yii::$app->user->isGuest)
        {
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
            ],
        ]);
    } else {
        // cambia la foto de acuerdo si tiene o no imagen cargada//

        $queryContador = Notificacion::find()
        ->where(['ID_USER_RECEPTOR' => Yii::$app->user->identity->id])
        ->andwhere(['visto' => false]) ->asArray()->all();
    
        $contador = count($queryContador);
        $display = "";
        if ($contador == 0){
            $display = "display:none;";
            $contador ="";
        }

        if (Yii::$app->user->identity->profile_picture == ''){
            $urlImagen= "../image/admin_icon.png";
        }
        else{
        $urlImagen = Yii::$app->user->identity->profile_picture;
        }
        //SI ES ADMIN
        if (User::isUserAdmin(Yii::$app->user->identity->id)) {
        
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-home']) . ' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' SEDES', 'url' => ['/sede/vistav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' INSTITUTOS', 'url' => ['/instituto/institutov'], 'options' => ['style' => 'font-weight: bold;']],
                    [
                        'label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' CARRERAS', 'options' => ['style' => 'font-weight: bold;'],

                        'items' => [
                            ['label' => '<span></span> Informacion de carreras', 'url' => '/carrera/carrerav'],
                            ['label' => '<span> Oferta academica', 'url' => '/carrera/ofertaacademica'],
                            ['label' => '<span> Oferta de examenes', 'url' => '/carrera/ofertaexamenes'],
                        ],
                    ],
                    [
                        'label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' ADMINISTRACION', 'options' => ['style' => 'font-weight: bold;'],

                        'items' => [
                            ['label' => '<span></span> Registrar usuario', 'url' => '/site/register'],
                            ['label' => '<span> Panel de administracion', 'url' => '/admin/panel'],
                            ['label' => '<span> Gestionar usuarios', 'url' => '/admin/users', ],
                            ['label' => '<span> Reportes', 'url' => '/admin/reportes'],
                        ],
                    ]
                ],
            ]);
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right navDerecha'],
                'items' => [
                    ['label' => Html::dropDownList('ciclo', null, $resultCiclos, ['class' => 'cambiarCiclo', 'id' => 'ddlCicloID']),'options' => ['class' => 'styled-select'],],
                    ['label' => Html::tag('span', '', ['class' => 'fa fa-bell']) .  '<span class="badge"' . "style=" . $display . ">  $contador   </span>" . '</span>', 'url' => ['/site/noti'], 'options' => ['style' => 'font-weight: bold; font-size:20px']],
                    Yii::$app->user->isGuest ? (['label' => Html::button('<i class="glyphicon glyphicon-log-in"></i> INGRESAR', ['value' => Url::to('/site/login2'), 'class' => 'btn btn-add-al', 'id' => 'modalLogin', 'style' => 'position:relative; top:-8px; font-weight: bold; background-color: Transparent;'])]) :
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

         //si es user
        if (User::isUserSimple(Yii::$app->user->identity->id)) {
            echo Nav::widget([
                'encodeLabels' => false, //Esto permite poner los iconos
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-home']) . ' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' SEDES', 'url' => ['/sede/vistav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' INSTITUTOS', 'url' => ['/instituto/institutov'], 'options' => ['style' => 'font-weight: bold;']],
                    [
                        'label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' CARRERAS', 'options' => ['style' => 'font-weight: bold;'],

                        'items' => [
                            ['label' => '<span></span> Informacion de carreras', 'url' => '/carrera/carrerav'],
                            ['label' => '<span> Oferta academica', 'url' => '/carrera/ofertaacademica'],
                            ['label' => '<span> Oferta de examenes', 'url' => '/carrera/ofertaexamenes'],
                        ],
                    ],
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' CREAR COMISION', 'url' => ['/comision/create'], 'options' => ['style' => 'font-weight: bold;']],
                ],
            ]);
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Html::dropDownList('ciclo', null, $resultCiclos, ['class' => 'cambiarCiclo', 'id' => 'ddlCicloID']),'options' => ['class' => 'styled-select'],],
                    ['label' => Html::tag('span', '', ['class' => 'fa fa-bell']) .  '<span class="badge"' . "style=" . $display . ">  $contador   </span>" . '</span>', 'url' => ['/site/noti'], 'options' => ['style' => 'font-weight: bold; font-size:20px']],
                    Yii::$app->user->isGuest ? (['label' => Html::button('<i class="glyphicon glyphicon-log-in"></i> INGRESAR', ['value' => Url::to('/site/login2'), 'class' => 'btn btn-add-al', 'id' => 'modalLogin', 'style' => 'position:relative; top:-8px; font-weight: bold; background-color: Transparent;'])]) :
                        [
                        'label' => '<img class= "imagenPerfil" src=' . $urlImagen .'><span style="margin-botom:0px; bottom:3px; position: relative; margin-left:4px">' . Yii::$app->user->identity->username .'</sman> ', 'options' => ['style' => 'font-weight: bold;'],
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-user"></span> Cuenta', 'url' =>'/user/updateprofile?id=' . Yii::$app->user->identity->id],
                            ['label' => '<span class="fa fa-lock"></span> Cambiar contraseña', 'url' => '/user/changepw'],
                            ['label' => '<span class="fa fa-book"> Manual de usuario', 'url' => '/site/manual'],
                            ['label' => '<span class="fa fa-info-circle"> Acerca de...', 'url' => '/site/about', ],
                            ['label' => '<span class="fa fa-sign-out"></span> Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ],
                    ]
                ],
            ]);
        }
        if (User::isUserGuest(Yii::$app->user->identity->id)) {
            echo Nav::widget([
                'encodeLabels' => false, //Esto permite poner los iconos
                'options' => ['class' => 'navbar-nav navbar-default'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-home']) . ' INICIO', 'url' => ['/site/index'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' SEDES', 'url' => ['/sede/vistav'], 'options' => ['style' => 'font-weight: bold;']],
                    ['label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' INSTITUTOS', 'url' => ['/instituto/institutov'], 'options' => ['style' => 'font-weight: bold;']],
                    [
                        'label' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-chevron-right']) . ' CARRERAS', 'options' => ['style' => 'font-weight: bold;'],

                        'items' => [
                            ['label' => '<span></span> Informacion de carreras', 'url' => '/carrera/carrerav'],
                            ['label' => '<span> Oferta academica', 'url' => '/carrera/ofertaacademica'],
                        ],
                    ],
                ],
            ]);
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Html::tag('span', '', ['class' => 'fa fa-bell']) .  '<span class="badge"' . "style=" . $display . ">  $contador   </span>" . '</span>', 'url' => ['/site/noti'], 'options' => ['style' => 'font-weight: bold; font-size:20px']],
                    Yii::$app->user->isGuest ? (['label' => Html::button('<i class="glyphicon glyphicon-log-in"></i> INGRESAR', ['value' => Url::to('/site/login2'), 'class' => 'btn btn-add-al', 'id' => 'modalLogin', 'style' => 'position:relative; top:-8px; font-weight: bold; background-color: Transparent;'])]) :
                        [
                        'label' => '<img class= "imagenPerfil" src=' . $urlImagen .'><span style="margin-botom:0px; bottom:3px; position: relative; margin-left:4px">' . Yii::$app->user->identity->username .'</sman> ', 'options' => ['style' => 'font-weight: bold;'],
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-user"></span> Cuenta', 'url' =>'/user/updateprofile?id=' . Yii::$app->user->identity->id],
                            ['label' => '<span class="fa fa-lock"></span> Cambiar contraseña', 'url' => '/user/changepw'],
                            ['label' => '<span class="fa fa-book"> Manual de usuario', 'url' => '/site/manual'],
                            ['label' => '<span class="fa fa-info-circle"> Acerca de...', 'url' => '/site/about', ],
                            ['label' => '<span class="fa fa-sign-out"></span> Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
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







    <?php
    yii\bootstrap\Modal::begin([
        'headerOptions' => ['id' => 'modalRestriHeader', 'style' => 'display: none'],
        'id' => 'modalRestri',
        'size' => 'modal-md',
        'clientOptions' => ['backdrop' => true, 'keyboard' => true]
    ]);
    echo "<div id='modalRestriContent' class='modal-cuerpo'></div>";
    yii\bootstrap\Modal::end();
    ?>
    <?php
    yii\bootstrap\Modal::begin([
        'headerOptions' => ['id' => 'modalHeader','style' => 'display: none'],
        'id' => 'modalEvento',
        'size' => 'modal-md',
        'clientOptions' => ['backdrop' => true, 'keyboard' => true]
    ]);
    echo "<div id='modalContent' class='modal-cuerpo'></div>";
    yii\bootstrap\Modal::end();
    ?>
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
            <input type="hidden" id="tipo" name="tipo" value="">
            Nombre:
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

