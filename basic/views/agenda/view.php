<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaAsigHoras */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Agenda Asig Horas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-asig-horas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de querer borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'hORA.HORA',
            'ID_DIA',
            'ID_AULA',
            'ID_USER_ASIGNA',
            'ID_USER_RECIBE',
            'COMISION_ASIGNADA',
            'PERIODO_LECTIVO',
        ],
    ]) ?>

</div>
