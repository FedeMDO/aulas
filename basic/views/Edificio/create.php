<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Edificio */


$this->params['breadcrumbs'][] = ['label' => 'Edificios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
<div class="edificio-create">
    <h1 style="color:white; border-bottom: 1px solid white;">Crear edificio</h1>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>