<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */


$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= \yii\helpers\Url::remember(); ?>
<div class="aula-view">
    <div class="col-md-offset-1 col-md-10">
    <h1 class=titulo><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'options' => ['class' => 'table-bordered table-condensed  grid'],
            'data' => [
                'confirm' => 'Estas seguro de querer borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table-bordered table-condensed  grid'],
        'attributes' => [
            'NOMBRE',
            'eDIFICIO.NOMBRE',
            'PISO',
            'CAPACIDAD',
        ],
    ]) ?>

</div>
</div>
