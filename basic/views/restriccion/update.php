<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */

$this->title = 'Update Restri Calendar: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Restri Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="restri-calendar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
