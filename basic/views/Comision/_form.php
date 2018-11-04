<?php

use app\models\Materia;
use kartik\select2\Select2;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Comision */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Crear comision';
$this->params['breadcrumbs'][] = $this->title;
?>
<h2 style="color:white; border-bottom: 1px solid white; ">Crear comision</h2>
<div class="comision-form">

    <?php if (Yii::$app->session->hasFlash('comisionesCreadas')):
	Alert::begin([
		'options' => [
			'class' => 'alert-success',
		],
	]);

	echo Yii::$app->session->getFlash('comisionesCreadas');

	Alert::end();
endif;?>

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'NOMBRE', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true])?>

    <?php $materias = Materia::find()->asArray()->all();
$result = ArrayHelper::map($materias, 'ID', 'NOMBRE');
$result1 = ArrayHelper::map($materias, 'ID', 'COD_MATERIA');

function arrayhelper2($result, $result1) {
	$nuevo = array();
	foreach ($result as $key => $value) {
		foreach ($result1 as $key1 => $value1) {
			if ($key == $key1) {
				$nombre = $result[$key];
				$codigo = $result1[$key1];
				$concatenar = $nombre . ' (' . $codigo . ')';
				array_push($nuevo, $concatenar);
				//var_dump($codigo);
				//var_dump($nombre);
				//$nuevo[] = [$key => $nombre . ' (' . $codigo . ')'];
				//var_dump($nuevo);

			}
		}
	}
	return $nuevo;
}
$lista = arrayhelper2($result, $result1);
//$test= ArrayHelper::map($result,"COD_MATEROA",)
//var_dump(static::getValue());
?>

    <?php echo $form->field($model, 'ID_MATERIA', ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
	'data' => $lista,
	"options" => ['multiple' => false,
		'placeholder' => 'Seleccione una materia...',
	],
]); ?>

    <?=$form->field($model, 'CARGA_HORARIA_SEMANAL', ['labelOptions' => ['style' => 'color:white']])->textInput()?>
    <?=$form->field($model, 'cant_comisiones', ['labelOptions' => ['style' => 'color:white']])->textInput()->label("Selecciona la cantidad de comisiones que desea crear")?>

    <div class="form-group">
        <?=Html::submitButton('Crear', ['class' => 'btn btn-success btn-block'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
