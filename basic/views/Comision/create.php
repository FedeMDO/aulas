<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comision */

?>
<div class="col-md-offset-4 col-md-5">
<div class="loginc azul">
<div class="comision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
