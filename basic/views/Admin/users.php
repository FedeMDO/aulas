<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;

$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
  

  
], 'css-print-theme');
$this->title = 'Gestionar usuarios';
?>


<div class="col-md-offset-1 col-md-10">
<h2 class=titulo style="text-align:center;">Gestión de usuarios</h2>
<div class="loginc">
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>USERNAME</th>
                  <th>EMAIL</th>
                  <th>INSTITUTO</th>
                  <th>ROL</th>
                  <th>EDITAR</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                  <td ><?=Html::encode("{$user->username} ")?></span></td>
                  <td><?=Html::encode("{$user->email} ")?></td>
                  <td> <?php if($user->instituto != NULL){
                            echo $user->instituto->NOMBRE;
                        }
                        else{
                            echo "(sin instituto)";
                        }
                  ?></td>
                  <td><?php if ($user->rol == 10): ?>
                            <?= Html::encode("Simple") ?>
                    <?php elseif ($user->rol == 20): ?>
                            <?= Html::encode("Administrador") ?>
                    <?php elseif ($user->rol == 30): ?>
                            <?= Html::encode("Guest") ?>
                    <?php endif; ?>
                    </td>
                    <td><a href="/user/update?id=<?=Html::encode("{$user->id}")?>"  class="btn btn-warning" role="button">Editar</a></td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            
</div>
</div>