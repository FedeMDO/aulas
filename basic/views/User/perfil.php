<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $form ActiveForm */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)) :
    \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);
endif;
?>

<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
    <?php $form = ActiveForm::begin(); ?>
    
    
    <h1 style="color:white; border-bottom: 1px solid white;">Perfil</h1>
    <?php if ($usuario->profile_picture == ""): ?>
    <img src="../image/admin_icon.png" id=#avatar height=200px; width=200px; alt="Avatar" style="margin-bottom:20px; border-radius: 50%" >
    <?php else : ?>
    <img src=<?php echo $usuario->profile_picture ?> height=200px;  alt="Avatar" style="margin-bottom:20px; border-radius: 50%"> 
    <?php endif ?>
        <?= $form->field($model, "file")->fileInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Confirmar', ['class' => 'btn btn btn-success btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>