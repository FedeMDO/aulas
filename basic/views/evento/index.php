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
</style>


    <div class="col-md-offset-1 col-md-10">
    
        <?php if (!app\models\User::isUserGuest(Yii::$app->user->identity->id)) : ?>    
        <div class="dropdown">
                <button class="btn btn-success">Nuevo evento</button>
                <div class="dropdown-content">
                    <a href="#"><?= Html::button('Nuevo evento periodico', ['value' => Url::to(['evento/create', 'id_aula' => $id_aula]), 'title' => 'Crear eventos que se repiten cada semana', 'class' => 'showModalButton btn ']); ?></a>
                    <a href="#"><?= Html::button('Nuevo evento especial', ['value' => Url::to(['especialcalendar/create', 'id_aula' => $id_aula]), 'title' => 'Crear un evento no periódico', 'class' => 'showModalButton btn ']); ?></a>
                </div>
        </div>
        <?php endif; ?>

        <?= Html::a('Ver en scheduler', Url::to(['edificio/scheduler?id_sede=' . $aula->eDIFICIO->sEDE->ID . '']), ['class' => 'btn btn-primary']); ?>  


        <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
        <?= Html::a('Ir a restriccion', Url::to(['restri/index?id=' . $id_aula . '']), ['class' => 'btn btn-primary']); ?>
        <?php endif; ?>

        <div style="display:none;">
            <em id:"id_aula"><?= Html::encode("{$id_aula}") ?></em>
        </div>

        <div class="loginc">
            <h3 style="text-align: center; font-weight: bold;">ASIGNACION COMISIONES DE AULA <i><?= Html::encode("{$aula->NOMBRE}") ?></i></h3>
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

<?php

