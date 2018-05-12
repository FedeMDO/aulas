<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;



?>



<h1>SEDES</h1>


<?php foreach ($sede as $sede): ?>

<div id="box_sede">
    <li>
        <?= Html::encode("{$sede->NOMBRE} ") ?>
        <br>
        <?= Html::encode(" {$sede->CALLEYNUM} ") ?>
        <br>
        <?= Html::encode("{$sede->LOCALIDAD}") ?>
    

    </li>
</div>

    <br>
    


<?php endforeach; ?>




<?= LinkPager::widget(['pagination' => $pagination]) ?>


