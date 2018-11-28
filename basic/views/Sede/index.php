<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SedeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sedes';
?>
<div class="sede-index">
    <h1 class=titulo>Panel de <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a('Crear Sede', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iNSTITUCION.NOMBRE',
            'NOMBRE',
            'CALLEYNUM',
            'LOCALIDAD',
            //'DISPONIBLE_DESDE',
            //'DISPONIBLE_HASTA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



   <!--<h1>HOLASS</h1>-->
</div>
