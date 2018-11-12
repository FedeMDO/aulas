<?php

use yii\helpers\Html;
use app\models\Comision;
use app\models\Users;
/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */

$this->title = 'Crear evento de calendario';
$this->params['breadcrumbs'][] = ['label' => 'Evento Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$carreras = Users::findOne(Yii::$app->user->identity->id)->instituto->carreras;

$materias = array();
$comisiones = array();

foreach($carreras as $carrera)
{
    foreach($carrera->materias as $mater)
    {
        $materias [] = $mater;
    }
}
foreach($materias as $m)
{
    foreach ($m->comisions as $comi)
    {
        $comisiones [] = $comi;
    }
}
?>
<div class="evento-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'materia' => $materia,'carrera' => $carrera,
    ]) ?>

</div>
