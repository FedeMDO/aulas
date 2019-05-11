<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacion */

$this->title = 'Actualizar notificacion';
$this->params['breadcrumbs'][] = ['label' => 'Notificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-offset-4 col-md-4">
<div class="notificacion-update loginc azul">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>