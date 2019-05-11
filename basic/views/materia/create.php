<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = 'Crear materia';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-4 col-md-4">
<div class="materia-create loginc azul">

    
    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>
</div>
