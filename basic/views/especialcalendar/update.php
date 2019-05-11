<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EspecialCalendar */

$this->title = 'Update Especial Calendar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Especial Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="especial-calendar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
