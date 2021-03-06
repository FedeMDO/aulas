<?php

use yii\helpers\Html;
use app\models\Users;
use app\models\Carrera;
use app\models\Materia;
use app\models\Instituto;


$this->title = 'Panel de administracion';
?>
<?php

$usuarios = Users::find()->count();
$institutos = Instituto::find()->count();
$carreras = Carrera::find()->count();
$materias = Materia::find()->count();


?>


<div class="container">
	<div class="row">
		<div class="row">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <div class="well dash-box boxAdmin">
                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= Html::encode("{$usuarios} ") ?></h2>
                <h4>Usuarios</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <div class="well dash-box boxAdmin">
            <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?= Html::encode("{$carreras} ") ?></h2>
            <h4>Carreras</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <div class="well dash-box boxAdmin">
            <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= Html::encode("{$materias} ") ?></h2>
            <h4>Materias</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <div class="well dash-box boxAdmin">
            <h2><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?= Html::encode("{$institutos} ") ?></h2>
            <h4>Institutos</h4>
            </div>
        </div>
</div>
</div>
</div>
