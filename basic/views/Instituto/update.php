<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instituto */

$this->title = 'Update Instituto: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Institutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_INSTITUTO, 'url' => ['view', 'id' => $model->ID_INSTITUTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instituto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
