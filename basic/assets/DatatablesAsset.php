<?php

namespace app\assets;

use yii\web\AssetBundle;

class DatatablesAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/datatables.bootstrap4.min.css',
        'css/buttons.dataTables.min.css'
    ];
    public $js = [

        'js/jquery-3.3.1.min.js',
        'js/datatables.min.js',
        'js/dataTables.bootstrap4.min.js',
        'js/dataTables.buttons.min.js',
        'js/buttons.flash.min.js',
        'js/jszip.min.js',
        'js/pdfmake.min.js',
        'js/vfs_fonts.js',
        'js/buttons.html5.min.js',
        'js/buttons.print.min.js',
        'js/mainDatatable.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}