<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comisiones';
?>
<div class="comision-index">

    <h1 class=titulo>Panel de comisiones</h1>
    <div class="col-md-offset-1 col-md-10">

    <p>
        <?= Html::a('Crear comision', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'NOMBRE',
            'mATERIA.NOMBRE',
            'CARGA_HORARIA_SEMANAL',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
