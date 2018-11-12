<?php

use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php ?>
<?php
$form = ActiveForm::begin(
	[
		'options' => [
			'class' => 'activenotifi',
		],
	]
);
?>
    <?php $result = ArrayHelper::map($usuarios, 'id', 'username');?>
    <?php echo $form->field($model, 'ID_USER_RECEPTOR')->widget(Select2::className(), [
	'data' => $result,
	"options" => ['multiple' => true,
		'placeholder' => 'Seleccione un usuario...',
	],
]);
?>
   <?=$form->field($model, 'NOTIFICACION')->widget(CKEditor::className(), [
	'options' => ['rows' => 6],
	'preset' => 'advanced',
])?>
    <div class="form-group">
        <div class="float-right">
            <?=Html::submitButton('Enviar', ['class' => 'btn btn-success'])?>
        </div>
    </div>
    <?php ActiveForm::end();?>

</div>