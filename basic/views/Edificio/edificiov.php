<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use app\models\User;
use yii\filters\AccessControl;


$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  
], 'css-print-theme');

$this->title = 'Edificios';
?>

<h1>TEST COMMIT</h1>