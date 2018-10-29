<?php
use yii\helpers\Html;

$this->registerCssFile("@web/css/index.css", [
	'depends' => [\yii\bootstrap\BootstrapAsset::className()],

], 'css-print-theme');

?>
<div class="col-md-offset-4 col-md-4">
<h1 style="color:white; text-align:center;">Recursos de aula</h1>

 <div class="loginc">
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NOMBRE</th>
                  <th>OBSERVACION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aula as $aula): ?>
                    <?php foreach ($aula->rECURSOs as $recurso): ?>

                    <td><?=Html::encode("{$recurso->NOMBRE} ")?>
                    <td><?=Html::encode("{$recurso->DESCRIPCION} ")?></td>
                    </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
              </table>
            </div>
</div>
</div>
