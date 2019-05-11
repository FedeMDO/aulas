<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CicloLectivo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ciclo Lectivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-lectivo-view">
<div class="col-md-offset-1 col-md-10">

    <h1 class=titulo><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que queres borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options'=>['class'=>'table-bordered table-condensed  grid'],
        'attributes' => [
            'id',
            'nombre',
            'fecha_inicio',
            'fecha_fin',
            'estado',
        ],
    ]) ?>

</div>
</div>
