<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use app\models\Edificio;
use app\models\Sede;
use app\models\Materia;
use kartik\select2\Select2;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->registerJsFile(
    '@web/js/main.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->title = 'Buscador de materias';


?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc" style="background-color: #2980b9;">
<h2 style="color:white; border-bottom: 1px solid white; text-align: center;">Buscador de materias</h2>


<?php $form = ActiveForm::begin([
    'method' => 'post',
    'id' => 'formulario',

]);

$recurso = Materia::find()->asArray()->all();
$result = ArrayHelper::map($recurso, 'ID', 'NOMBRE');

$recurso2 = Edificio::find()->asArray()->all();
$resulta = ArrayHelper::map($recurso2, 'ID', 'NOMBRE');

$recurso3 = Sede::find()->asArray()->all();
$resultado = ArrayHelper::map($recurso3, 'ID', 'NOMBRE');


?>

<?php echo $form->field($materias, 'ID', ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
    'data' => $result,
    "options" => []
])->label('Seleccione materia'); ?>

<?php echo $form->field($sedes, 'ID', ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
    'data' => $resultado,
    "options" => [
        'placeholder' => 'Seleccione sede',
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ]
])->label('Nombre de Sede');
?>

 <?php echo $form->field($edificio, 'ID', ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
    'data' => $resulta,
    "options" => []
])->label('Nombre de Edificio');

?>

<?= Html::submitButton("Buscar", [
    "class" => "btn btn-success btn-block",
]) ?>  


<?php $form->end() ?>
