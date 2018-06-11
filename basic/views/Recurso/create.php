<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = 'Create Recurso';
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
