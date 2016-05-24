<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 20.05.16
 * Time: 20:05
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class SignAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010';

    public $css = [
        'adminlte/plugins/iCheck/all.css',
    ];

    public $js = [
        'adminlte/plugins/iCheck/icheck.min.js',
    ];

    public $depends = [
        'app\modules\admin\assets\AdminLteAsset',
    ];
}