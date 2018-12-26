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
    <div class="col-md-offset-1 col-md-10">
        <div class="row">
            <div class="col-sm-4">
            <?php echo $form->field($instituto, 'ID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
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
            <?php echo $form->field($carrera, 'ID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
                array(),
                ['prompt' => 'Seleccione...']
            )->label('Carrera'); ?>
        </div>
        <div class="col-xs-3">
        <?php echo $form->field($ciclo, 'id', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
            $resultCiclos,
            ['prompt' => 'Seleccione...',
            ]
        )->label('Ciclo'); ?>
        </div>
        <div class="col-xs">
            <button id="btnBuscar" type="button" class="btn btn-secondary">Buscar</button>
        </div>

        </div>
<?php ActiveForm::end() ?>

        <div class="loginc">
        <h4 style="text-align: center; font-weight: bold; color: black;">OFERTA ACADEMICA</h4>
        <table id="example" class="cell-border compact stripe hover" style="width:100%">
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
        <br>
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
    </div>
    
<?php
