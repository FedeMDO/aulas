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
	<td>
	<br><strong><div style="float: left; width: 300px; line-height:0.5em;">Usuario receptor</div></strong>
    <?php echo $form->field($model, 'ID_USER_RECEPTOR')->widget(Select2::className(), [
	'data' => $result,
	"options" => ['multiple' => true,
		'placeholder' => 'Seleccione un usuario...',
	],
])->label('');
?> <strong><div style="float: left; width: 300px; line-height:0.8em;">Notificacion</div></strong></td>
   <?=$form->field($model, 'NOTIFICACION')->widget(CKEditor::className(), [
	'options' => ['rows' => 6],
	'preset' => 'advanced',
])->label('');?>
    <div class="form-group">
        <div class="float-right">
            <?=Html::submitButton('Enviar', ['class' => 'btn btn-success'])?>
        </div>
    </div>
    <?php ActiveForm::end();?>

</div>