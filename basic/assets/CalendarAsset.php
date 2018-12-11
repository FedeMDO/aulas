<?php

namespace app\assets;

use yii\web\AssetBundle;

class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fullcalendar.css',
        'css/scheduler.css'
    ];
    public $js = [

        'js/moment.min.js',
        'js/fullcalendar.js',
        'js/scheduler.js',
        'js/es-us.js',
        'js/mainEventoCalendar.js',
        'js/crearEventosAjax.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\jui\JuiAsset'
    ];
}