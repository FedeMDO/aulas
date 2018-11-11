<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituto-index">

    <h1 class=titulo>Panel de <?=Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-md-offset-1 col-md-10">
    <p>
        <?= Html::a('Crear Instituto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iNSTITUCION.NOMBRE',
            'NOMBRE',
            'COLOR_HEXA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
