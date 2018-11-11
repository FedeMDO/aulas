<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comision */

$this->title = 'Actualizar Comision: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Comisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-offset-4 col-md-4">
<div class="comision-update loginc azul">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
