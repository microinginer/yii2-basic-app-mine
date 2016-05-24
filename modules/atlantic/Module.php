<?php

namespace app\modules\atlantic;

use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

/**
 * atlantic module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\atlantic\controllers';

    public $publicKey = '';

    public $privateKey = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }


    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        \app\modules\admin\Module::getInstance()->sidebarMenuItems = ArrayHelper::merge(
            \app\modules\admin\Module::getInstance()->sidebarMenuItems, [
                [
                    'label' => \yii\bootstrap\Html::tag('i', '', ['class' => 'fa fa-server']) . ' &nbsp; ' . \yii\bootstrap\Html::tag('span', \Yii::t('app', 'Atlantic Server')),
                    'url' => ['/atlantic/default/index']
                ]
            ]
        );
    }
}
