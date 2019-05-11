<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Instituto;
use app\models\Carrera;
use app\models\CicloLectivo;
use yii\helpers\ArrayHelper;
use miloschuman\highcharts\Highcharts;

use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\assets\DatatablesAsset;


DatatablesAsset::register($this);

$this->registerCssFile("@web/css/index.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-print-theme');

$this->title = 'Oferta academica';

$this->params['breadcrumbs'][] = $this->title;
$indexMaterias = 1;
$carrera = new Carrera();
$instituto = new Instituto();
$ciclo = new CicloLectivo();

$institutos = Instituto::find()->asArray()->all();
$resultIns = ArrayHelper::map($institutos, 'ID', 'NOMBRE');
$ciclos = CicloLectivo::find()->asArray()->all();
$resultCiclos = ArrayHelper::map($ciclos, 'id', 'nombre');
?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-md-2',
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<style>
    td{
        text-align: center
    }
    label {
        color: black !important;
    }

    @media (max-width: 768px) {
        .col-xs-3 {
            width: 100% !important;
        }

        .btn-buscar {

            margin-left: 15px;
            margin-right: 15px;

        }
    }

    @media (max-width: 1024px) {
        .btn-buscar {
            margin-left: 15px;
            margin-right: 15px;

        }
    }
</style>
<div class="col-md-offset-1 col-md-10">
    <div class="row">
        <div class="col-sm-4">
            <?php echo $form->field($instituto, 'ID', ['labelOptions' => ['style' => 'color:white !important']])->dropDownList(
                $resultIns,
                [
                    'prompt' => 'Seleccione...',
                    'onchange' => '
                            $.post( "' . Yii::$app->urlManager->createUrl('comision/listcarrera?id=') . '"+$(this).val(), function( data ) {
                            $( "select#carrera-id" ).html( data );
                            });
                        '
                ]
            )->label('Instituto'); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($carrera, 'ID', ['labelOptions' => ['style' => 'color:white !important']])->dropDownList(
                array(),
                ['prompt' => 'Seleccione...']
            )->label('Carrera'); ?>
        </div>
        <div class="col-xs-3">
            <?php echo $form->field($ciclo, 'id', ['labelOptions' => ['style' => 'color:white !important']])->dropDownList(
                $resultCiclos,
                [
                    'prompt' => 'Seleccione...',
                ]
            )->label('Ciclo'); ?>
        </div>
        <div class="col-xs">
            <button id="btnBuscar" type="button" disabled class="btn btn-default btn-buscar">Buscar</button>
        </div>

    </div>
    <?php ActiveForm::end() ?>

    <div class="loginc">
        <h4 style="text-align: center; font-weight: bold; color: black;">OFERTA ACADEMICA</h4>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Carrera</th>
                        <th>Año carrera</th>
                        <th>Asignatura</th>
                        <th>Nro. Comision</th>
                        <th>Día</th>
                        <th>Hora inicio</th>
                        <th>Hora final</th>
                        <th>Sede</th>
                        <th>Edificio</th>
                        <th>Aula</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>

<?php
