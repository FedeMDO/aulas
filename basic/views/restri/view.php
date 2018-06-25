<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RestriCalendar */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Restri Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restri-calendar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'ID_Aula',
            'ID_Instituto_Recibe',
            'ID_Tipo_Repeticion',
            'ID_User_Recibe',
            'Fecha_ini',
            'Fecha_fin',
            'Periodo_Academico',
        ],
    ]) ?>

</div>
