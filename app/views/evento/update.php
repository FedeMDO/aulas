<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */

$this->title = 'Update Evento Calendar: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Evento Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evento-calendar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
