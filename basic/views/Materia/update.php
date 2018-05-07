<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = 'Update Materia: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_MATERIA, 'url' => ['view', 'id' => $model->ID_MATERIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
