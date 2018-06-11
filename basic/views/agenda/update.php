<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaAsigHoras */

$this->title = 'Update Agenda Asig Horas: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Agenda Asig Horas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agenda-asig-horas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
