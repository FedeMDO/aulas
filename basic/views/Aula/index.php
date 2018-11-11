<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-index">

    <h1 class=titulo>Panel de <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-md-offset-1 col-md-10">
    <p>
        <?= Html::a('Crear aula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NOMBRE',
            'eDIFICIO.NOMBRE',
            'PISO',
            'CAPACIDAD',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
