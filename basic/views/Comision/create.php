<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comision */

$this->title = 'Crear comison';
$this->params['breadcrumbs'][] = ['label' => 'Comisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-4 col-md-5">
<div class="loginc">
<div class="comision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
