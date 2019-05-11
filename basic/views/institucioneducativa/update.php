<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstitucionEducativa */

$this->title = 'Update Institucion Educativa: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Institucion Educativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_INSTITUCION, 'url' => ['view', 'id' => $model->ID_INSTITUCION]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="institucion-educativa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
