<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 17.03.16
 * Time: 12:20
 */

namespace app\widgets\social;


use yii\web\AssetBundle;

class SocialConnectAssets extends AssetBundle
{
    public $sourcePath = '@app/widgets/social/assets';

    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'styles.css',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}