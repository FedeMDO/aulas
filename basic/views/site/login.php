<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Ingresar';
$this->params['breadcrumbs'][] = $this->title;


$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
]);




?>

    
<div id="box_login">

<div class="loginc">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="alert alert-info">
     <strong>ATENCION!</strong> Igresa tu nomobre de usuario y contraseña 
    si no tenes conseguite uno. Donde? <a href=<?=Url::toRoute("site/register")?>>aca</a>
    </div>



    

    <p>Please fill out the following fields to login:</p>
  
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',

        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Usuario') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->label('Recordarme') ?>



        <div class="form-group">
            <div class="">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-md', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>


</div>

</div>


