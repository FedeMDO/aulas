<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use app\models\recurso;
use app\models\Edificio;
use app\models\Sede;
use app\models\Aula;
use kartik\select2\Select2;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

$this->registerJsFile(
    '@web/js/main.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->title = 'Buscador de aulas';


?>
<div class="col-md-offset-4 col-md-4">
<div class="loginc" style="background-color: #2980b9;">
<h2 style="color:white; border-bottom: 1px solid white; text-align: center;">Buscador de aula</h2>


<?php $form = ActiveForm::begin([
    'method' => 'post',
    'id' => 'formulario',

]);

$recurso = recurso::find()->asArray()->all();
$result = ArrayHelper::map($recurso, 'ID', 'NOMBRE');

$recurso2 = Edificio::find()->asArray()->all();
$resulta = ArrayHelper::map($recurso2, 'ID', 'NOMBRE');

$recurso3 = Sede::find()->asArray()->all();
$resultado = ArrayHelper::map($recurso3, 'ID', 'NOMBRE');


?>

<?php echo $form->field($sedes, 'ID', ['labelOptions' => ['style' => 'color:white', 'value' => 'hola']])->widget(Select2::className(), [
    'data' => $resultado,
    "options" => [
        'placeholder' => 'Seleccione sede',
        'onchange' =>
            '$.post( "' . Yii::$app->urlManager->createUrl('aula/listedificio?id=') . '"+$(this).val(), function( data ) {
            $( "select#edificio-id" ).html( data );
            });'
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

<?php echo $form->field($model, "ID", ['labelOptions' => ['style' => 'color:white']])->widget(Select2::className(), [
    'data' => $result,
    "options" => [
        'multiple' => true,
        'placeholder' => 'Seleccione recurso'
    ]
])->label("Nombre de recurso");
?>

<?= $form->field($buscador, 'PISO', ['labelOptions' => ['encode' => false]])->textInput(['maxlength' => true])
    ->label('Piso <i class="glyphicon glyphicon-question-sign"></i>', [
        'class' => 'dashed-line',
        'data-toggle' => 'popover',
        'data-content' => 'Por favor deje este campo vacio si quiere buscar aulas con cualquier piso',
        'data-placement' => 'right',
        'encode' => false,
    ]) ?>

<?= $form->field($buscador, 'CAPACIDAD', ['labelOptions' => ['encode' => false]])->textInput(['maxlength' => true])
    ->label('Capacidad minima <i class="glyphicon glyphicon-question-sign"></i>', [
        'class' => 'dashed-line',
        'data-toggle' => 'popover',
        'data-content' => 'Por favor deje este campo vacio si quiere buscar aulas de cualquier capacidad',
        'data-placement' => 'right',
        'encode' => false,
    ]) ?>

<?= Html::submitButton("Buscar", [
    "class" => "btn btn-success btn-block",
]) ?>  


</div>
</div>
<?php $form->end() ?>
