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
      
        'js/jquery-3.3.1.min.js',
        'js/moment.min.js',
        'js/fullcalendar.js',
        'js/scheduler.js',
        'js/es-us.js',
        'js/main2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}