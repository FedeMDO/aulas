<?php
/**
 * Created by PhpStorm.
 * User: Fede
 * Date: 28/10/2018
 * Time: 08:41 PM
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\assets\SchedulerAsset;

SchedulerAsset::register($this);

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-print-theme');

$this->title = 'Aulas de edificios segun sede seleccionada';
$this->params['breadcrumbs'][] = $this->title;
?>
<em id:"id_sede"><?=Html::encode("{$sede->ID}")?></em>
<div class="col-md-offset-1 col-md-10">
    <div class="loginc">
        <!-- THE CALENDAR -->
        <div class="evento-index">
            <div class="evento-calendar-index">
                <div class="evento-index">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

