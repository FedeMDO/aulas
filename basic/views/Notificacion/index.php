<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacion-index">

    <h1 class= titulo><?= Html::encode('Panel de notificaciones') ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-md-offset-1 col-md-10">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_USER_EMISOR',
            'ID_USER_RECEPTOR',
            'NOTIFICACION',
            'FECHA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
