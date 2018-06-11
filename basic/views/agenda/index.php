<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agenda Asig Horas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-asig-horas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Agenda Asig Horas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_HORA',
            'ID_DIA',
            'ID_AULA',
            'ID_USER_ASIGNA',
            //'ID_USER_RECIBE',
            //'COMISION_ASIGNADA',
            //'PERIODO_LECTIVO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
