<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
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
?>
    
    <div class="col-md-offset-1 col-md-10">
        
        <div class="loginc">
        <h3 style="text-align: center; font-weight: bold;">OFERTA ACADEMICA</h3>
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
        <tbody>
            <tr>
                <td>Ingenieria Informatica</td>
                <td>4</td>
                <td>Ingenieria de Software II</td>
                <td>1</td>
                <td>Lunes</td>
                <td>18:00hs</td>
                <td>20:00hs</td>
                <td>Carrillo (HEC)</td>
                <td>HEC</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Ingenieria Informatica</td>
                <td>4</td>
                <td>Ingenieria de Software II</td>
                <td>1</td>
                <td>Jueves</td>
                <td>18:00hs</td>
                <td>20:00hs</td>
                <td>Carrillo (HEC)</td>
                <td>HEC</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Ingenieria Informatica</td>
                <td>5</td>
                <td>Aplicacion Java sobre Web</td>
                <td>1</td>
                <td>Sabado</td>
                <td>12:00hs</td>
                <td>16:00hs</td>
                <td>Carrillo (HEC)</td>
                <td>HEC</td>
                <td>2</td>
            </tr>
        <tfoot>
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
        </tfoot>
    </table>
        </div>
    </div>
<?php

