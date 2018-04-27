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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instituto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_INSTITUTO',
            'ID_INSTITUCION',
            'NOMBRE',
            'DESCRIPCION',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
