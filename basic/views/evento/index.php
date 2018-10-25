<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\assets\CalendarAsset;

CalendarASset::register($this);

$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-print-theme');

$this->title = 'Calendario de asignacion';

$this->params['breadcrumbs'][] = $this->title;
$indexMaterias = 1;
?>

<div class="col-md-offset-1 col-md-10">
<div class="loginc">
<h3 style="text-align: center; font-weight: bold;">ASIGNACION COMISIONES DE AULA   <em id:"id_aula"><?=Html::encode("{$id_aula}")?></em></h3>
<div class="content-wrapper" >
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 style="text-align: center; font-weight: bold;">Materias</h3>
            </div>
            <div class="card-body">
              <!-- the events -->
              <div id="external-events">
                <?php foreach ($filter as $materia) {
                  ?>
                  <h5 style="font-weight: bold;"><?= Html::encode("{$materia->NOMBRE} ") ?></h5>
                  <?php foreach ($materia->comisions as $comision) {
                    ?>
                <div class="external-event bg-primary" style="background-color:<?php echo $color;?>"value="<?= Html::encode("{$comision->ID} ") ?>"> <?= Html::encode("{$comision->NOMBRE} ") ?></div>
                <?php
                }
              ?>
                              <?php
                }
              ?>
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>
            </div>
            <!-- <!aca termina el body de materias/>/.card-body -->
          </div>

         
          <!-- /. box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <div class="card-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                
              </div>
              <!-- /btn-group -->
              <div class="input-group">
               
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary">
            <div class="card-body p-0">
              <!-- THE CALENDAR -->
              <div class="evento-index">


<div class="evento-calendar-index">
<div class="evento-index">

<h1><?= Html::encode($this->title) ?></h1>

  <?php Modal::begin([
          'header' => '<h4>eventos nico</h4>',                        
          'id'     => 'model',
          'size'   => 'model-lg',
          ]);
            
      echo "<div id='modelContent'></div>";
  Modal::end();
?>
<div id='calendar'></div>
 
</div>
</div>
</div>
<?php

