<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Edificio */

$this->title = 'Actualizacion Edificio';
$this->params['breadcrumbs'][] = ['label' => 'Edificios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
<div class="edificio-update">

    <h1 style="color:white; border-bottom: 1px solid white;">Actualizacion edificio</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>