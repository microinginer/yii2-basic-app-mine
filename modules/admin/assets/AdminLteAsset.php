<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 22.09.15
 * Time: 13:27
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class AdminLteAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010';

    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'adminlte/dist/css/AdminLTE.min.css',
        'adminlte/dist/css/skins/skin-green.min.css',
    ];

    public $js = [
        'adminlte/dist/js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
