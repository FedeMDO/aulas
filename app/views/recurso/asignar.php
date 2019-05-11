<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = 'Asignar recurso a aula';
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-4 col-md-4">
<div class="recurso-create loginc azul">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formAsignar', [
        'model1' => $model1,
        'aulaResultado'   => $aulaResultado,
        'aulaRecurso' => $aulaRecurso,
    ]) ?>

</div>
</div>
