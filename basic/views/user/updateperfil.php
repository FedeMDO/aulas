<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comision */

$this->title = 'Modificar perfil';
?>
<div class="col-md-offset-4 col-md-4">
<div class="user-update loginc azul">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formperfil', [
        'model' => $model,
        'model1' => $model1,
        'usuario' => $usuario,
    ]) ?>

</div>
</div>
</div>
