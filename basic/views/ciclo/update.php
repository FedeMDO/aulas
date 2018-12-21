<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CicloLectivo */

$this->title = 'Update Ciclo Lectivo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ciclo Lectivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
<div class="ciclo-lectivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
