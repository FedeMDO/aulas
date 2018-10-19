<?php
 
namespace app\assets;
 
use yii\web\AssetBundle;
 
class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fullcalendar.css',
    ];
    public $js = [
      
      'js/jquery-3.3.1.min.js',
      'js/moment.min.js',
      'js/fullcalendar.min.js',
      'js/es-us.js',
      'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}