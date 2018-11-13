<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */

$this->title = 'Crear Restriccion';
$this->params['breadcrumbs'][] = ['label' => 'Restri Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restri-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
