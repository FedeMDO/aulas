<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="site-error">
<?php if($exception->statusCode==404) : ?>
    <div class="error">
    <div class="imagenrobot">
    <img style="width:500px; margin-left:100px;"src="../image/broken-robot-2.png"/><br><br><h3>OOOPS! no pudimos encontrar esta pagina:</h3><h1 style="font-size:100px">ERROR 404</h1>
    </div>
    </div>
<?php elseif($exception->statusCode==403) : ?>
<div class="error">
    <div class="imagenrobot">
    <img style="width:500px;"src="../image/candado.png"/><br><br><h3>Lo sentimos no tienes permisos para realizar esta accion</h3><h1 style="font-size:100px">ERROR 403</h1>
    </div>
    </div>
<?php else : ?>
<div class="error">
    <div class="imagenrobot">
    <img style="width:500px; margin-left:100px;"src="../image/broken-robot-2.png"/><br><br><h3>Lo sentimos ha ocurrido un error:</h3><h1 style="font-size:100px">ERROR<?php echo $exception->statusCode;?></h1>
    </div>
    </div>
<?php endif; ?>

