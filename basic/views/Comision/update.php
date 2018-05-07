<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comision */

$this->title = 'Update Comision: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Comisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_COMISION, 'url' => ['view', 'id' => $model->ID_COMISION]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
