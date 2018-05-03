<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comision */

$this->title = 'Create Comision';
$this->params['breadcrumbs'][] = ['label' => 'Comisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
