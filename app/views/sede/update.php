<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sede */

$this->title = 'Actualizacion Sede';

?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
<div class="sede-update">

    <h1 style="color:white; border-bottom: 1px solid white;">Actualizacion Sede</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>