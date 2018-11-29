<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-view">

    <h1 class=titulo><?=Html::encode($this->title)?></h1>
	<div class="col-md-offset-1 col-md-10">

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->ID], [
	'class' => 'btn btn-danger',
	'data' => [
		'confirm' => 'Estas seguro?',
		'method' => 'post',
	],
])?>
    </p>

    <?=DetailView::widget([
	'model' => $model,
	'options' => ['class' => 'table-bordered table-condensded grid'],
	'attributes' => [
		'ID',
		'NOMBRE',
		'DESC_CORTA',
		'COD_MATERIA',
	],
])?>

</div>
