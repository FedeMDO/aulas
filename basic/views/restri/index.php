<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\assets\RestriCalendarAsset;

RestriCalendarAsset::register($this);

$this->registerCssFile("@web/css/index.css", [
  'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-print-theme');

$this->title = 'Calendario de asignacion de restricciones';

$this->params['breadcrumbs'][] = $this->title;
$indexMaterias = 1;
?>
    
    <div class="col-md-offset-1 col-md-10">
        
    <?= Html::button('Nueva restriccion', ['value' => Url::to(['restri/create', 'id_aula' => $id_aula]), 'title' => $id_aula, 'class' => 'showModalButton btn btn-success']); ?>
    <?= Html::a('Ir a calendario', Url::to(['evento/index?id='.$id_aula.'']), ['class' => 'btn btn-primary']); ?>
    <div style="display:none;">
    <em id:"id_aula"><?=Html::encode("{$id_aula}")?></em>
    </div>

        <div class="loginc">
        <h3 style="text-align: center; font-weight: bold;">ASIGNACION DE RESTRICCIONES DE AULA <i><?= Html::encode("{$aula}") ?></i></h3>
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

