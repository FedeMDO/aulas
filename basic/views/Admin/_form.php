<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php ?>
<?php
    $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'activenotifi'
             ]
        ]
    );
    ?>
    <?php $result = ArrayHelper::map($usuarios, 'id', 'username'); ?>
    <?php echo $form->field($model, 'ID_USER_RECEPTOR')->widget(Select2::className(),[
        'data' => $result,
        "options" => ['multiple'=> true, 
        'placeholder' => 'Seleccione un usuario...'
        ]
    ]);
	 ?>
    <?= $form->field($model, 'NOTIFICACION')->textArea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>