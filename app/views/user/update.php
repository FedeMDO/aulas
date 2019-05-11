<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comision */

$this->title = 'Actualizar usuario';
?>
<div class="col-md-offset-4 col-md-4">
<div class="user-update loginc azul">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
