<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use app\models\recurso;
use app\models\Edificio;
use app\models\Sede;


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
$resultado = ArrayHelper::map($recurso3, 'ID','NOMBRE');


?>
<div class="form-group">

<?php echo $form->field($model,'ID')->dropDownlist(
    $resultado, ['prompt'=>'seleccione...']
    )->label('Nombre de Sede');

?>

<?php echo $form->field($edificio, 'ID')->dropDownList(
        $resulta, 
        ['prompt'=>'seleccione...']
        )->label('Nombre de Edificio');

    
?>

<?= $form->field($model, "ID")->checkboxList(
        $result, 
        ['Label'=>'seleccione...']
        )->label('Nombre de Recurso');


?>
</div>

<?= Html::submitButton("buscar aulas", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
</div>


</div>

</div>