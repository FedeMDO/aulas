<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comision */

?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
<div class="comision-create">
<h2 style="color:white; border-bottom: 1px solid white; ">Crear comision</h2>

    <?= $this->render('_form', [
        'model' => $model,'instituto' => $instituto,'carrera' => $carrera,
    ]) ?>

</div>
</div>
</div>