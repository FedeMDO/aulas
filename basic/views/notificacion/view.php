<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacion */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Notificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacion-view">
    <div class="col-md-offset-1 col-md-10">
    <h1 class= titulo><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID], [
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
            'ID',
            'ID_USER_EMISOR',
            'ID_USER_RECEPTOR',
            'NOTIFICACION',
            'FECHA',
        ],
    ]) ?>

</div>
</div>
