<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdificioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edificios';

?>
<div class="edificio-index">

    <h1 class=titulo>Panel de edificios</h1>
    <div class="col-md-offset-1 col-md-10">

    <p>
        <?= Html::a('Crear Edificio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sEDE.NOMBRE',
            'NOMBRE',
            'CANTIDAD_AULAS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
