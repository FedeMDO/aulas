<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */

$this->title = 'Create Evento Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Evento Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'aula1'=>$aula1,'nombreusuario'=>$nombreusuario,
    ]) ?>

</div>
