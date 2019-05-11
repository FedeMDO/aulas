<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Edificio */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Edificios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edificio-view">

    <h1 class=titulo><?= Html::encode($this->title) ?></h1>
    <div class="col-md-offset-1 col-md-10">
    <p>
        <?= Html::a('Actualizar', ['Actualizar', 'id' => $model->ID], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Borrar', ['Borrar', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options'=>['class'=>'table-bordered table-condensed  grid'],
        'attributes' => [
            'sEDE.NOMBRE',
            'NOMBRE',
            'CANTIDAD_AULAS',
        ],
    ]) ?>

</div>
</div>
