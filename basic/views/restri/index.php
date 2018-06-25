<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RestriCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restri Calendars';
$this->params['breadcrumbs'][] = $this->title;
?>
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
'id'=>'evento',
'clientOptions'=>[
    'weekends' => true,
    'editable' => true,
    'droppable'=> true,
 
],
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
