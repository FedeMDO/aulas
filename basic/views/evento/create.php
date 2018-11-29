<?php

use yii\helpers\Html;
use app\models\Comision;
use app\models\Users;
use app\models\User;
use app\models\Carrera;
/* @var $this yii\web\View */
/* @var $model app\models\EventoCalendar */

$this->title = 'Crear evento de calendario';
$this->params['breadcrumbs'][] = ['label' => 'Evento Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if (!User::isUserAdmin(Yii::$app->user->identity->id)){
    $carreras = Users::findOne(Yii::$app->user->identity->id)->instituto->carreras;
}
else{
    $carreras = Carrera::find()->asArray()->all();
}

?>
<div class="evento-calendar-create">
    <?= $this->render('_form', [
        'model' => $model,'materia' => $materia,'carrera' => $carrera, 'carreras' => $carreras,
    ]) ?>

</div>
