<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    
], 'css-print-theme');


?>


<div class=table1>
<table>
  <tr>
    <th>Instituto de Ingenieria</th>
    <th>Mail</th>
    <th>id</th>
  </tr>
 
  <tr>
    <td>Ingenieria Informatica</td>
    <td>informatica@unaj.edu.ar</td>
    <td>01</td>
  </tr>
  <tr>
    <td>Ingenieria Petroleo</td>
    <td>petroleo@unaj.edu.ar</td>
    <td>02</td>
  </tr>
  <tr>
    <td>Ingenieria Industrial</td>
    <td>industrial@unaj.edu.ar</td>
    <td>03</td>
  </tr>
</table>
</div>

<div>
    <br>
</br>
</div>




