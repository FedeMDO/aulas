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

$result1 = ArrayHelper::map($inst, 'ID', 'NOMBRE');
$result2 = ArrayHelper::map($carr, 'ID', 'NOMBRE');
$result = ArrayHelper::map($mat, 'ID', 'NOMBRE');
$resulta = ArrayHelper::map($edi, 'ID', 'NOMBRE');
$resultado = ArrayHelper::map($sede, 'ID', 'NOMBRE');


?>

<?php echo $form->field($materias, 'ID', ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
        'data' => $result,
        'options' => [
        ]
    ])->label('Materia'); ?>

<?php echo $form->field($sedes, 'ID', ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
    'data' => $resultado,
    "options" => [
        'placeholder' => 'Seleccione sede...',
        'onchange' => '$.post( "' . Yii::$app->urlManager->createUrl('sede/listedificio?id=') . '"+$(this).val(), function( data ) {
            $( "select#edificio-id" ).html( data );
            });'
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ]
])->label('Sede');
?>

 <?php echo $form->field($edificio, 'ID', ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
    'data' => $resulta,
    "options" => [
        'placeholder' => 'Seleccione edificio...',
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ]
])->label('Edificio');

?>

<?= Html::submitButton("Buscar", [
    "class" => "btn btn-success btn-block",
]) ?>  


<?php $form->end() ?>
</div>
</div>