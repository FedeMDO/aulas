<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Sede */

$this->title = 'Create Sede';
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
    <h1 style="color:white; border-bottom: 1px solid white;">Crear sede</h1>
    <?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
    ]);
?>
<?= $form->field($model, "NOMBRE",['labelOptions'=>['style'=>'color:white']])->label("Nombre de sede") ?>  
<?= $form->field($model, "CALLEYNUM",['labelOptions'=>['style'=>'color:white']])->label("Calle") ?>  
<?= $form->field($model, "LOCALIDAD",['labelOptions'=>['style'=>'color:white']])->label("Localidad") ?>  
<?= $form->field($model, "DISPONIBLE_DESDE",['labelOptions'=>['style'=>'color:white']])->label("Disponible desde") ?>  
<?= $form->field($model, "DISPONIBLE_HASTA",['labelOptions'=>['style'=>'color:white']]) ->label("Disponible hasta") ?>  
<?= Html::submitButton("Crear", ["class" => "btn btn-success btn-block"]) ?>  
<?php $form->end() ?>
</div>
</div>