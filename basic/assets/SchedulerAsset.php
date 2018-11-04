<?php

namespace app\assets;

use yii\web\AssetBundle;

class SchedulerAsset extends AssetBundle
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
        'js/main.js',
        'js/crearEventosAjax.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}