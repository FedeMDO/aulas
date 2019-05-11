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
echo '<div class= "col-md-8" style="margin-top:20px">'
?>
	<?php $result = ArrayHelper::map($usuarios, 'id', 'username');?>
    <?php echo $form->field($model, 'ID_USER_RECEPTOR', ['labelOptions'=>['style'=>'color:white']])->widget(Select2::className(), [
	'data' => $result,
	"options" => ['multiple' => true,
		'placeholder' => 'Seleccione un usuario...',
	],
])->label('Usuario receptor');

?>
   <?=$form->field($model, 'NOTIFICACION', ['labelOptions'=>['style'=>'color:white']])->widget(CKEditor::className(), [
	'options' => ['rows' => 6],
	'preset' => 'advanced',
])->label('Notificacion');?>
    <div class="form-group">
        <div class="float-right">
            <?=Html::submitButton('Enviar', ['class' => "btn btn-primary mb1 bg-blue"])?>
        </div>
    </div>

    <?php ActiveForm::end();?>

</div>