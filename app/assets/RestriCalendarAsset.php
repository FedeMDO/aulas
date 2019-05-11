<?php

namespace app\assets;

use yii\web\AssetBundle;

class RestriCalendarAsset extends AssetBundle
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
        'js/mainRestriCalendar.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}