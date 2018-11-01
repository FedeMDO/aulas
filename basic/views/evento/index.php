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
    <h3 style="text-align: center; font-weight: bold;">ASIGNACION COMISIONES DE AULA   <em id:"id_aula"><?=Html::encode("{$id_aula}")?></em></h3>
    <div class="col-md-offset-1 col-md-10">
        <div class="loginc">
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

