<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

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
<div class="loginc">
<center><h3>ASIGNACION COMISIONES DE AULA   <em id:"id_aula"><?=Html::encode("{$id_aula}")?></em></h3></center>
<div class="content-wrapper" >
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
        
          <div class="card">
          
            <div class="card-header">
              <center><h3>Materias</h3></center>
            </div>
            <div class="card-body">
              <!-- the events -->
              <div id="external-events">
                <?php foreach ($filter as $materia) {
                  ?>
                  <h5><?= Html::encode("{$materia->NOMBRE} ") ?></h5>
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
  'lang' => 'en',
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
  var date2 =$("em").text();
  
}',
'eventClick'=>'function(event){
  var titulo = event.title;
  var inicio = event.start.format();
  var fin = event.end.format();
  var date2 = $("em").text();
  if (!confirm("Guardar cambios en base de datos?")){
    revertFunc();
  }
  else{
    $.post("/evento/upd2",
    {
      titulo:titulo,
      fecini:inicio,
      fin:fin,
      date2:date2
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
    '@web/js/main.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);