<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CicloLectivo */

$this->title = 'Create Ciclo Lectivo';
$this->params['breadcrumbs'][] = ['label' => 'Ciclo Lectivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-lectivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
