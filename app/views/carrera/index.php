<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarreraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras';

?>
<div class="carrera-index">

    <h1 class=titulo>Panel de <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Crear Carrera', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'options' => [
            'class' => 'table-responsive',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iNSTITUTO.NOMBRE',
            'NOMBRE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
