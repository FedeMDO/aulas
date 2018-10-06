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
<div class="col-md-offset-4 col-md-4">
<div class="loginc azul">
<h2 style="color:white; border-bottom: 1px solid white;">Buscador de aula</h2>


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

<?php echo $form->field($sedes, 'ID',['labelOptions'=>['style'=>'color:white']])->widget(Select2::className(),[
        'data'=>$resultado, 
        "options" =>[
        'placeholder'=> 'Seleccione sede',
        ]
        ])->label('Nombre de Sede');
?>

 <?php echo $form->field($edificio, 'ID',['labelOptions'=>['style'=>'color:white']])->widget(Select2::className(),[
        'data'=>$resulta, 
        "options" =>[
        'placeholder'=> 'Seleccione edificio',
        ]
        ])->label('Nombre de Edificio');

?>

<?php echo $form->field($model, "ID",['labelOptions'=>['style'=>'color:white']])->widget(Select2::className(),[
        'data' => $result, 
        "options" => ['multiple'=> true, 
        'placeholder' => 'Seleccione recurso'
        ]
    ])->label("Nombre de recurso");
?>
<?= Html::submitButton("buscar aulas", ["class" => "btn btn-success btn-block"]) ?>  

</div>



<?php $form->end() ?>
</div>


</div>

</div>