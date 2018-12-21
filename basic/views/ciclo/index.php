<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CicloLectivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ciclo Lectivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-lectivo-index">

    <h1 class=titulo>Panel de <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear ciclo lectivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table-bordered table-condensed  grid'],
        'options' => [
            'class' => 'table-responsive',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'fecha_inicio',
            'fecha_fin',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
