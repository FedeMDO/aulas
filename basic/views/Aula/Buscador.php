<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use app\models\recurso;
use app\models\Edificio;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>

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


?>
<div class="form-group">
<?= $form->field($model, "NOMBRE")->checkboxList(
        $result, 
        ['Label'=>'seleccione...']
        );


?>

 <?php echo $form->field($edificio, 'NOMBRE')->dropDownList(
        $resulta, 
        ['prompt'=>'seleccione...']
        );

    
?>
</div>

<?= Html::submitButton("buscar aulas", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
</div>




