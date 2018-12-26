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

$this->title = 'Reportes';

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
    <div class="col-md-offset-1 col-md-10">
        <?php 
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => ['text' => 'Uso del espacio por día'],
                'xAxis' => [
                    'categories' => ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado']
                ],
                'yAxis' => [
                    'title' => ['text' => 'Horas de aula'],
                    'labels' => ['format' => '{value} hs']
                ],
                'series' => [
                    ['type' => 'column', 'name' => 'Horas por Comisiones', 'data' => [$comisiones["Lunes"], $comisiones["Martes"], $comisiones["Miercoles"], $comisiones["Jueves"], $comisiones["Viernes"], $comisiones["Sabado"]]],
                    ['type' => 'column', 'name' => 'Horas por Eventos Especiales', 'data' => [$especiales["Lunes"], $especiales["Martes"], $especiales["Miercoles"], $especiales["Jueves"], $especiales["Viernes"], $especiales["Sabado"]]],
                ],
                'credits' => [
                    'enabled' => false
                ]
            ]
        ]);

        ?>
        <br>
        <?php 
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => ['text' => '% de utilización total por institutos'],
                'subtitle' => ['text' => 'Comisiones (izquierda) - Eventos especiales (derecha)'],
                'chart' => [
                    'plotBackgroundColor' => null,
                    'potBorderWidth' => null,
                    'plotShadow' => false,
                    'type' => 'pie'
                ],
                'plotOptions' => [
                    'pie' => [
                        //'size' => '60%',
                        'allowPointSelect' => true,
                        'cursor' => 'pointer',
                    ]
                ],
                'series' => [
                    [
                        'type' => 'pie',
                        'name' => 'Total Horas de comision',
                        'data' => $porcentajePorInstitutoComision,
                        'center' => ["25%", "50%"],
                    ],
                    [
                        'type' => 'pie',
                        'name' => 'Total Horas de ev. especial',
                        'data' => $porcentajePorInstitutoEspecial,
                        'center' => ["75%", "50%"]
                    ]
                ],
                'credits' => [
                    'enabled' => false
                ]
            ]
        ]);

        ?>
        <br>
        <?php 
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => ['text' => 'Actividad de usuarios'],
                'xAxis' => [
                    'categories' => array_keys($actividadCreando["Especiales"])
                ],
                'yAxis' => [
                    'title' => ['text' => 'Cantidad de eventos'],
                ],
                'series' => [
                    ['type' => 'column', 'name' => 'Eventos de comisiones creados', 'data' => array_values($actividadCreando["Comisiones"])],
                    ['type' => 'column', 'name' => 'Eventos de comisiones modificados', 'data' => array_values($actividadModificando["Comisiones"])],
                    ['type' => 'column', 'name' => 'Eventos especales creados', 'data' => array_values($actividadCreando["Especiales"])],
                    ['type' => 'column', 'name' => 'Eventos especiales modificados', 'data' => array_values($actividadModificando["Especiales"])]
                ],
                'credits' => [
                    'enabled' => false
                ]
            ]
        ]);
        ?>
    </div>
    
<?php
