<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notificaciones';

?>
<div class="notificacion-index">

    <h1 class= titulo>Panel de notificaciones</h1>
    <div class="col-xs-offset-1 col-xs-10 col-xs-9 col-lg-9">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'uSEREMISOR.username',
            'uSERRECEPTOR.username',
            'NOTIFICACION',
            'FECHA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
