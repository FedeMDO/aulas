<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\assets\RestriCalendarAsset;

RestriCalendarAsset::register($this);

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-print-theme');

$this->title = 'Calendario de asignacion de restricciones';

$this->params['breadcrumbs'][] = $this->title;
$indexMaterias = 1;

?>

<header>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</header>


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
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

.breadcrumb{
    margin-bottom: 0px;
}
</style>


<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="active">
        <!-- header -->
        <div class="sidebar-header" style= "border-bottom:1px solid #47748b">
                <h3>Calendario restricciones</h3>
            </div>
        <ul >
            <p>Restricciones por edificio</p>
            <?php foreach ($aula->eDIFICIO->sEDE->edificios as $edificio):?>
                    <?php if(count($edificio->aulas) !=0): ?>
                    <li>
                        <a href="#pageSubmenu<?php echo $edificio->ID ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-align:left"><?php echo $edificio->NOMBRE?><i class="glyphicon glyphicon-chevron-down" style="float:right"></i></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu<?php echo $edificio->ID ?>">
                    </li>
                    <?php foreach ($edificio->aulas as $aula): ?>
                        <li><a style="text-align:left" href="/restri/index?id=<?= Html::encode("{$aula->ID}") ?>"><?= Html::encode("{$aula->NOMBRE}") ?></a></li>
                <?php endforeach ?>
                </ul>
                </li>
                <?php endif?>
                <?php endforeach ?>
                <p></p>
                <li><a href="../aula/buscador" style="text-align:left"><span class="glyphicon glyphicon-search"></span> Filtrar aulas </a></li>
                <li><a href="../materia/buscador" style="text-align:left"><span class="glyphicon glyphicon-search"></span> Filtrar materias </a></li>
                <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                <li><a href="../materia/create" style="text-align:left"><span class="glyphicon glyphicon-plus"></span> Crear materias </a></li>
                <?php endif ?>
                <ul class="list-unstyled CTAs" style="border-top: 1px solid #47748b;">
                <li><a href="../edificio/scheduler?id_sede= <?=$aula->eDIFICIO->sEDE->ID?>"   class="article">Scheduler</a></li>
                <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                <li><a href="../evento/index?id= <?=$id_aula?>"   class="article">Ir a calendario</a></li>
                <?php endif; ?>
                    
            </ul>
        </ul>
    </nav>
    <!--termina sidebar-->
    <div id="content">
        <!-- boton de sidebar-->
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary" style="margin-botom:20px"><i class="glyphicon glyphicon-align-justify"></i> Menu</button>
            <?php if (!app\models\User::isUserGuest(Yii::$app->user->identity->id)) : ?> 
            <?= Html::button('Nueva restriccion', ['value' => Url::to(['restri/create', 'id_aula' => $id_aula]), 'title' => $id_aula, 'class' => 'showModalButton btn btn-success']); ?>
            <?php endif; ?>
    </div>
            
        
 
        <!-- Contenido de la pagina -->
        <div class="col-md-12">
        <div style="display:none;">
        <em id="id_aula"><?= Html::encode("{$id_aula}") ?></em>
        </div>
    
            <div class="loginc">
            <h3 style="text-align: center; font-weight: bold;">ASIGNACION DE RESTRICCIONES DE AULA <i><?= Html::encode("{$aula->NOMBRE}") ?></i></h3>
                <div class="evento-index">
    
                    <div class="evento-calendar-index">
                    
                        <div class="evento-index">
                                <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div id="dialog-confirm" title="Tipo de evento" style="display: none">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Seleccione el tipo de evento que quiere crear</p>
</div>

  </div> <!-- final del contenido-->
</div> <!-- final del wraper-->
<!-- script para sidebar -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</html>


    
    
    

<?php

