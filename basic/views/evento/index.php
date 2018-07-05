<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ASIGNACION COMISIONES A AULA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thumbnail">
<div class="content-wrapper" >
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Materias</h4>
            </div>
            <div class="card-body">
              <!-- the events -->
              <div id="external-events">
                <?php foreach ($filter as $cons) {
                  ?>
                    <h5><?= Html::encode("{$cons->NOMBRE} ") ?></h5>
                    <?php foreach ($cons->comisions as $comision) {
                  ?>

                <div class="external-event bg-warning" value="<?= Html::encode("{$comision->ID} ") ?>"> <?= Html::encode("{$comision->NOMBRE} ") ?></div>
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
            <!-- /.card-body -->
          </div>
          <!-- /. box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Event</h3>
            </div>
            <div class="card-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-primary" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-warning" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-success" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-danger" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                <div class="input-group-append">
                  <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                </div>
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

<?php   
Modal::begin([
                    'header' => '<h4>eventos nico</h4>'
                    
,                        'id'     => 'model',
                    'size'   => 'model-lg',
            ]);
            
            echo "<div id='modelContent'></div>";
            Modal::end();
?>

 <?= yii2fullcalendar\yii2fullcalendar::widget(array(
'events'=>$events,
'options' => [
  'lang' => 'es',
  //... more options to be defined here!
],
'id'=>'evento',
'clientOptions'=>[
    'weekends' => true,
    'editable' => true,
    'droppable'=> true,
  
 
],'eventResize'=>'function(event, delta, revertFunc) {
  var id =event.id;
  var ini=event.start.format();
  var fin=event.end.format(); 
  alert(ini);
  if (!confirm("Esta seguro??")) {
      revertFunc();}
      else
      {
  $.post("/evento/upd",
  { 
      id:id,
      fecini:ini,
      fin:fin
  
  },
  function(data)
  {
      if (data){
          alert("se actulaizo bien");
      }
      else {
          alert("error");
          }
  });
}}',
'eventReceive'=>'function(){alert("recive bien");}',
'eventClick'=>'function(){alert("haciendo click");}',
'eventDrop' => 'function( event, delta, revertFunc, jsEvent, ui, view ) { 

var id =event.id;
var ini=event.start.format();
var fin=event.end.format(); 

if (!confirm("Esta seguro??")) {
    revertFunc();}
    else
    {
$.post("/evento/upd",
{ 
    id:id,
    fecini:ini,
    fin:fin

},
function(data)
{
    if (data){
        alert("se actulaizo conrrectamente");
    }
    else {
        alert("error");
        }
});
}}
    '));
?>
</div>
</div>
</div>
<?php


$this->registerJsFile(
    '@web/js/dragable.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/js/main.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);