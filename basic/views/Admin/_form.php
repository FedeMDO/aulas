<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php ?>
<div class="notificacion-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $result = ArrayHelper::map($usuarios, 'id', 'username'); ?>
    
    <?php echo $form->field($model, 'ID_USER_RECEPTOR')->dropDownList(
            $result, 
			['prompt'=>'Choose...']
			); ?>

    <?= $form->field($model, 'NOTIFICACION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
