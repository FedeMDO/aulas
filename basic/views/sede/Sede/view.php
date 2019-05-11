<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sede */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-view">

    <h1 class=titulo><?= Html::encode($this->title) ?></h1>
    <div class="col-md-offset-1 col-md-10">
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que queres borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'options'=>['class'=>'table-bordered table-condensed  grid'],
        'model' => $model,
        'attributes' => [
            'iNSTITUCION.NOMBRE',
            'NOMBRE',
            'CALLEYNUM',
            'LOCALIDAD',
            'DISPONIBLE_DESDE',
            'DISPONIBLE_HASTA',
        ],
    ]) ?>

</div>
</div>
