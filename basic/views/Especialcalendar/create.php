<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EspecialCalendar */

$this->title = 'Create Especial Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Especial Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especial-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
