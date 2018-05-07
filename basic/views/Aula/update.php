<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */

$this->title = 'Update Aula: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_AULA, 'url' => ['view', 'id' => $model->ID_AULA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
