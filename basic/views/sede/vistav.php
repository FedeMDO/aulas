<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>SEDES</h1>
<ul>
<?php foreach ($sede as $sede): ?>
    <li>
        <?= Html::encode("{$sede->NOMBRE} ") ?>
        <br>
        <?= Html::encode(" {$sede->CALLEYNUM} ") ?>
        <br>
        <?= Html::encode("{$sede->LOCALIDAD}") ?>

        <hr>

    </li>
    <p class=holam >hola mundo<p/>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>