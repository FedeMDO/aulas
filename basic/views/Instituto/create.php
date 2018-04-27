<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Instituto */

$this->title = 'Create Instituto';
$this->params['breadcrumbs'][] = ['label' => 'Institutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
