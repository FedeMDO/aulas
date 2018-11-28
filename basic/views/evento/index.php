<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\assets\CalendarAsset;

CalendarAsset::register($this);

$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-print-theme');

$this->title = 'Calendario de asignacion';

$this->params['breadcrumbs'][] = $this->title;
$indexMaterias = 1;
?>
    
    <div class="col-md-offset-1 col-md-10">
    <?php if (!app\models\User::isUserGuest(Yii::$app->user->identity->id)): ?>    
    <?= Html::button('Nuevo evento', ['value' => Url::to(['evento/create', 'id_aula' => $id_aula]), 'title' => $id_aula, 'class' => 'showModalButton btn btn-success']); ?>
    <?php endif; ?>
    <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)): ?>
    <?= Html::a('Ir a restriccion', Url::to(['restri/index?id='.$id_aula.'']), ['class' => 'btn btn-primary']); ?>
    <?php endif; ?>
    <div style="display:none;">
    <em id:"id_aula"><?=Html::encode("{$id_aula}")?></em>
    </div>

        <div class="loginc">
        <h3 style="text-align: center; font-weight: bold;">ASIGNACION COMISIONES DE AULA <i><?= Html::encode("{$aula}") ?></i></h3>
            <div class="evento-index">

                <div class="evento-calendar-index">
                
                    <div class="evento-index">
                            <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php

