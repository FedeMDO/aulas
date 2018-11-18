<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MateriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materias';
?>
<div class="materia-index">

	<h1 class='titulo'><?=Html::encode($this->title)?></h1>
	<div class="col-md-offset-1 col-md-10">

    <p>
        <?=Html::a('Crear materia', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'tableOptions'=>['class'=>'table-bordered table-condensed  grid'],
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		'ID',
		'NOMBRE',
		'DESC_CORTA',
		'COD_MATERIA',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
</div>
