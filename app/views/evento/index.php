<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\assets\CalendarAsset;

CalendarAsset::register($this);

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-print-theme');

$this->title = 'Calendario de asignacion';

$this->params['breadcrumbs'][] = $this->title;

$indexMaterias = 1;
?>
<style>
    .ui-widget-header {
        border: 1px solid #337ab7;
        background: #337ab7;
        color: #ffffff;
        font-weight: bold;
    }

    /* Style The Dropdown Button */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 8px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }

    .breadcrumb {
        margin-bottom: 0px;
    }

    .calendario {
        background-color: white;
        padding: 15px;
        margin-top: 20px;
        border-radius: 5px;
    }

    .btn-nuevoEvento {

        background-color: white;
        color: black;
        border-radius: 0px;
    }

    .btn-nuevoEvento:hover {
        background-color: #e6ecf0;

    }

    .loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 9999;
    }

    .loader img {
        width: 30%;
        height: 30%;
    }
</style>

<header>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</header>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="active">
        <!-- header -->
        <div class="sidebar-header" style="border-bottom:1px solid #47748b">
            <h3>Calendario</h3>
        </div>
        <ul>
            <p>Aulas por edificio</p>
            <?php foreach ($aula->eDIFICIO->sEDE->edificios as $edificio) : ?>
                <?php if (count($edificio->aulas) != 0) : ?>
                    <li>
                        <a href="#pageSubmenu<?php echo $edificio->ID ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-align:left"><?php echo $edificio->NOMBRE ?><i class="glyphicon glyphicon-chevron-down" style="float:right"></i></a>
                        <ul class="collapse list-unstyled" id="pageSubmenu<?php echo $edificio->ID ?>">
                    </li>
                    <?php foreach ($edificio->aulas as $aula1) : ?>
                        <li><a style="text-align:left" href="/evento/index?id=<?= Html::encode("{$aula1->ID}") ?>"><?= Html::encode("{$aula1->NOMBRE}") ?></a></li>
                    <?php endforeach ?>
                </ul>
                </li>
            <?php endif ?>
        <?php endforeach ?>
        <p></p>
        <li><a href="../aula/buscador" style="text-align:left"><span class="glyphicon glyphicon-search"></span> Filtrar aulas </a></li>
        <li><a href="../materia/buscador" style="text-align:left"><span class="glyphicon glyphicon-search"></span> Filtrar materias </a></li>
        <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
            <li><a href="../materia/create" style="text-align:left"><span class="glyphicon glyphicon-plus"></span> Crear materias </a></li>
        <?php endif ?>
        <ul class="list-unstyled CTAs" style="border-top: 1px solid #47748b;">
            <li><a href="../edificio/scheduler?id_sede=<?= $aula->eDIFICIO->sEDE->ID ?>" class="article" style="padding-left:10px !important">Scheduler</a></li>
            <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                <li><a href="../restri/index?id=<?= $id_aula ?>" class="article" style="padding-left:10px !important">Restricciones</a></li>
            <?php endif; ?>

        </ul>
        </ul>
    </nav>
    <!--termina sidebar-->
    <div id="content">
        <!-- boton de sidebar-->
        <div class="container-fluid">
            <div class="row">
                <button type="button" id="sidebarCollapse" class="btn btn-primary" style="margin-botom:20px"><i class="glyphicon glyphicon-align-justify"></i> Menu</button>
                <?php if (!app\models\User::isUserGuest(Yii::$app->user->identity->id)) : ?>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" data-toggle="popover" data-placement="bottom">Nuevo evento
                            <span class="caret"></span></button>
                        <div class="dropdown-content" style="background-color:white;">
                            <a href="#"><?= Html::button('Nuevo evento periodico', ['value' => Url::to(['evento/create', 'id_aula' => $id_aula]), 'title' => 'Crear eventos que se repiten cada semana', 'class' => 'showModalButton btn btn-nuevoEvento   btn-block']); ?></a>
                            <a href="#"><?= Html::button('Nuevo evento especial', ['value' => Url::to(['especialcalendar/create', 'id_aula' => $id_aula]), 'title' => 'Crear un evento no periódico', 'class' => 'showModalButton btn btn-nuevoEvento btn-block ']); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <!-- Contenido de la pagina -->
                <div class="col-md-10">
                    <div style="display:none;">
                        <em id="id_aula"><?= Html::encode("{$id_aula}") ?></em>
                    </div>
                    <div class="calendario">
                        <h3 style="text-align:center; ">ASIGNACION COMISIONES DE AULA <i><?= Html::encode("{$aula->NOMBRE}") ?></i></h3>
                        <div class="evento-index">
                            <div class="evento-calendar-index">
                                <div class="evento-index">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- registro de actividad -->
                <div class="col-sm-2">
                    <div class="panel panel-default" style="padding: 15px;margin-top: 20px;border-radius: 5px;">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center">Actividad</h3>
                        </div>
                        <div class="panel-body" style="font-size:0.75em; max-height: 495px; overflow-y: scroll;">
                            <ul>
                               <!-- <li>24/04/2019 19:42 - Algo que hicieron</li>
                                <li>20/04/2019 15:33 - Otra cosa que hicieron</li>
                                <li>11/04/2019 08:50 - Algo habrán hecho</li> -->
                                <?php foreach ($actividades as $actividad): ?>
                                <?php $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $actividad->MOMENTO); ?>
                                    <li><?= Html::encode("{$fecha->format('d-m-Y H:i')}")?> - <?= Html::encode($actividad->USER_REALIZA) ." ". Html::encode($actividad->ACCION)?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- final del registro de actividad -->
                <div id="dialog-confirm" title="Tipo de evento" style="display: none">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Seleccione el tipo de evento que quiere crear</p>
                </div>
            </div>
        </div>
    </div> <!-- final del contenido-->
</div> <!-- final del wraper-->
<div id="LoadingImage" class="loader" style="display:none; text-align:center">
    <img src="../image/waitingAjax.gif">
    <p >Cargando...</p>
</div>
<!-- script para sidebar -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

</html>


<?php
