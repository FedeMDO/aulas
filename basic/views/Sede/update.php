<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sede */

$this->title = 'Actualizacion Sede';

?>
<div class="loginc">
<div class="sede-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>