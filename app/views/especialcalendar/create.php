<?php

use yii\helpers\Html;
use app\models\Comision;
use app\models\Users;
use app\models\User;
use app\models\Carrera;
use yii\jui\DatePicker;
use app\models\Instituto;
/* @var $this yii\web\View */
/* @var $model app\models\EspecialCalendar */
$this->params['breadcrumbs'][] = ['label' => 'Especial Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$carrera = new Carrera();
if (!User::isUserAdmin(Yii::$app->user->identity->id)){
    $carreras = Users::findOne(Yii::$app->user->identity->id)->instituto->carreras;
}
else{
    $carreras = array();
}
$instituto = new Instituto();
$institutos = Instituto::find()->asArray()->all();

?>
<div class="especial-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'materia' => $materia, 'carrera' => $carrera, 'carreras' => $carreras,
        'instituto' => $instituto, 'institutos' => $institutos,
    ]) ?>

</div>
