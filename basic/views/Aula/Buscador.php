<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use app\models\recurso;
use app\models\Edificio;
use app\models\Sede;
use kartik\select2\Select2;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>
<div class="">
<div class="loginc">
<center><h3>Buscador de aula</h3></center>
<ul>

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

<?php echo $form->field($sedes, 'ID')->widget(Select2::className(),[
        'data'=>$resultado, 
        "options" =>[
        'placeholder'=> 'Seleccione sede',
        ]
        ])->label('Nombre de Sede');
?>

<?php echo $form->field($model, "ID")->widget(Select2::className(),[
        'data' => $result, 
        "options" => ['multiple'=> true, 
        'placeholder' => 'Seleccione recurso'
        ]
    ])->label("Nombre de recurso");
?>

<?php echo $form->field($edificio, 'ID')->widget(Select2::classNAme(),[
        'data' => $resulta,
        'options' => ['placeholder'=> 'Seleccione edificio'
        ]
    ])->label('Nombre de Edificio');    
?>

 <?php echo $form->field($edificio, 'ID')->widget(Select2::className(),[
        'data'=>$resulta, 
        "options" =>[
        'placeholder'=> 'Seleccione edificio',
        ]
        ])->label('Nombre de Edificio');

    
?>

</div>

<?= Html::submitButton("buscar aulas", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
</div>


</div>

</div>