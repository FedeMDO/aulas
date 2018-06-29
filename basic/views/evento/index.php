<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evento Calendars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
  

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Draggable Events</h4>
            </div>
            <div class="card-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-success">Lunch</div>
                <div class="external-event bg-warning">Go home</div>
                <div class="external-event bg-info">Do homework</div>
                <div class="external-event bg-primary">Work on UI design</div>
                <div class="external-event bg-danger">Sleep tight</div>
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
 <div class="thumbnail">
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
  
 
],'eventResize'=>'function(){alert("hola mundo");}',
// 'eventReceive'=>'function(){alert("recive bien");}',
'eventDrop' => 'function( event, delta, revertFunc, jsEvent, ui, view ) { 

var id =event.id;
var ini=event.start.format(); 
alert(id);
if (!confirm("Esta seguro??")) {
    revertFunc();}
    else
    {
$.post("/evento/upd",
{ 
    id:id,
    fecini:ini

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