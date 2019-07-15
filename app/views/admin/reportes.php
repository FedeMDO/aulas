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
use app\models\Users;
use app\models\Materia;

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

<?php

$usuarios = Users::find()->count();
$institutos = Instituto::find()->count();
$carreras = Carrera::find()->count();
$materias = Materia::find()->count();
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
    <div class="col-md-offset-1 col-md-9">
        <?php 
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'modules/export-data'
            ],
            'options' => [
                'title' => ['text' => 'Uso del espacio por día (horas)'],
                'xAxis' => [
                    'categories' => ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado']
                ],
                'yAxis' => [
                    'title' => ['text' => 'Horas de aula'],
                    'labels' => ['format' => '{value} hs']
                ],
                'series' => [
                    ['type' => 'column', 'name' => 'Horas por Comisiones (' . $cicloSess->nombre . ")", 'data' => [$comisiones["Lunes"], $comisiones["Martes"], $comisiones["Miercoles"], $comisiones["Jueves"], $comisiones["Viernes"], $comisiones["Sabado"]]],
                    ['type' => 'column', 'name' => 'Horas por Eventos Especiales (Histórico)', 'data' => [$especiales["Lunes"], $especiales["Martes"], $especiales["Miercoles"], $especiales["Jueves"], $especiales["Viernes"], $especiales["Sabado"]]],
                ],
                'credits' => [
                    'enabled' => false
                ]
            ]
        ]);

        ?>
        <br>
        <?php 
        $seriesJson = '';
        $days = array("Lunes", "Martes", "Miercoles", "Jueves","Viernes","Sabado");
        foreach($porcentajePorDiaPorInstituto as $k => $v){
            $seriesJson .= '{"type": "column", "name": "'.$k.'" ';
            $seriesJson .= ', "color": "'.$colors[$k].'" ';
            $seriesJson .= ', "data": [ ';
            for($i = 0; $i < 6; $i++){
                $seriesJson .= ($i < 5) ? $v[$days[$i]] . ', ': $v[$days[$i]];
            }
            $seriesJson .= ' ]},';
        }
        
        $seriesJson = mb_substr($seriesJson , 0, -1);

        echo Highcharts::widget([
            'scripts' => ["modules/exporting", "modules/export-data"],
            'options'=>'{
               "title": { "text": "Uso del espacio de comisiones por Instituto y por día (porcentaje) para el ciclo '. $cicloSess->nombre .'" },
               "xAxis": {
                  "categories": ["Lunes", "Martes", "Miercoles", "Jueves","Viernes","Sabado"]
               },
               "yAxis": {
                  "title": { "text": "Porcentaje de horas" },
                  "labels": {"format": "{value}%"}
               },
               "series": ['.$seriesJson.'],
               "plotOptions": {"column": {"stacking": "percent"}},
               "credits": {"enabled": false}
            }'
         ]);
        ?>
        
        <br>
        <?php 
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'modules/export-data'
            ],
            'options' => [
                'title' => ['text' => '% de utilización total por institutos'],
                'subtitle' => ['text' => 'Comisiones del ciclo lectivo '.$cicloSess->nombre.' (izquierda) - Eventos especiales (derecha)'],
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
                'modules/export-data'
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
                    ['type' => 'column', 'name' => 'Eventos de comision creados ('.$cicloSess->nombre.')', 'data' => array_values($actividadCreando["Comisiones"])],
                    ['type' => 'column', 'name' => 'Eventos de comision modif. ('.$cicloSess->nombre.')', 'data' => array_values($actividadModificando["Comisiones"])],
                    ['type' => 'column', 'name' => 'Eventos especales creados', 'data' => array_values($actividadCreando["Especiales"])],
                    ['type' => 'column', 'name' => 'Eventos especiales modif.', 'data' => array_values($actividadModificando["Especiales"])]
                ],
                'credits' => [
                    'enabled' => false
                ]
            ]
        ]);
        ?>
    </div>
    
<?php
