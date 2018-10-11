<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  

  
], 'css-print-theme');


$this->title = '';

$this->params['breadcrumbs'][] = $this->title;
$indexMaterias = 1;
?>
<div class="col-md-offset-1 col-md-10">
<div class="loginc">
<h3 style="text-align: center; font-weight: bold;">RESTRI CALENDAR AULA <em id:"id_aula"><?=Html::encode($id_aula)?></em></h3>
<div class="content-wrapper" >
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 style="text-align: center; font-weight: bold;">Institutos</h3>
            </div>
            <div class="card-body">
              <!-- the events -->
              <div id="external-events">
              <?php $i = 0; ?>
                <?php foreach ($institutos as $instituto){
                        $i = $i + 1;
                        echo $i;
                  ?>
                  <?php
                    ?>
                <div class="external-event bg-primary" style="background-color:<?php echo $instituto->COLOR_HEXA;?>"value="<?= Html::encode($instituto->ID) ?>"> <?= Html::encode($instituto->NOMBRE) ?></div>
                <?php
                }
              ?>
                              <?php
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

<?php $JSDayClick = "
    
    "
?>
<?php $JSCode = "
    function(start, end) {
      var title = 'restri';
      var aula = $('em').text();
      var eventData;
      if (title) {
          eventData = {
              title: title,
              start: start,
              end: end,
          };
          $('#evento').fullCalendar('renderEvent', eventData, true);
        }
      $('#evento').fullCalendar('unselect');
    }
      "
?>

 <?= yii2fullcalendar\yii2fullcalendar::widget(array(
    'events'=> $events,
    'options' => [
      'lang' => 'es',
      //... more options to be defined here!
    ],
    'id'=>'evento',
    'clientOptions'=>[
        'weekends' => true,
        'days' => true,
        'editable' => true,
        'droppable'=> true,
        'minTime' => '08:00:00', 
        'maxTime' => '23:00:00',
        'height' => 'auto',
        //'selectable' => true,
        //'select'=> new \yii\web\JsExpression($JSCode)
  
 
],

'eventResize'=>'function(event, delta, revertFunc) {
  var id =event.id;
  var ini=event.start.format();
  var fin=event.end.format(); 
  if (!confirm("Confirmar cambios")) {
      revertFunc();}
      else
      {
  $.post("/evento/upd",
  { 
      id:id,
      fecini:ini,
      fin:fin,
      

  
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
'eventReceive'=>'function(event){
  alert("Por favor elija un intervalo de horas");
  var titulo=event.title;
  var inicio=event.start.format();
  
}',
'eventClick'=>'function(event){
  var titulo = event.title;
  var inicio = event.start.format();
  var fin = event.end.format();
  var aula = $("em").text();
  if (!confirm("Guardar cambios en base de datos?")){
    revertFunc();
  }
  else{
    $.post("/restri/restri",
    {
      fecini: inicio,
      fin: fin,
      aula: aula
    });
  }
}',
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
    '@web/js/main2.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);