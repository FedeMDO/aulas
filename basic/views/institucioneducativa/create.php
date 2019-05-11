<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InstitucionEducativa */

$this->title = 'Create Institucion Educativa';
$this->params['breadcrumbs'][] = ['label' => 'Institucion Educativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institucion-educativa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
