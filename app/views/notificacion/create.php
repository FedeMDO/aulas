<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notificacion */

$this->title = 'Crear notificacion';
$this->params['breadcrumbs'][] = ['label' => 'Notificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-4 col-md-4">
<div class="notificacion-create loginc azul">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
