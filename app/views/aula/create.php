<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aula */

$this->title = 'Crear aula';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
<div class="aula-create">
    <h1 style="color:white; border-bottom: 1px solid white;">Crear aula</h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
