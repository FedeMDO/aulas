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
$request = Yii::$app->request;
$edificio = $request->post(); 
$result = ArrayHelper::map($edificio, 'ID', 'NOMBRE');

?>


<h1>AULAS</h1>
<ul>

<?php foreach ($result as $result): ?>
    <li>
    <td ><?= Html::encode("{$result} ")?></span></td>
    </li>
<?php endforeach; ?>
</ul>






