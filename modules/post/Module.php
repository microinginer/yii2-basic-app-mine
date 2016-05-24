<?php

namespace app\modules\post;

use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/**
 * post module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\post\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['post*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/post/messages',
        ];
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
                    'label' => Html::tag('i', '', ['class' => 'fa fa-sticky-note-o']) . ' &nbsp; ' . Html::tag('span', \Yii::t('app', 'Posts')),
                    'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        ['label' => Yii::t('post', 'Create Post'), 'url' => ['/post/default/create'],],
                        ['label' => Yii::t('post', 'Posts'), 'url' => ['/post/default/index'],],
                    ],
                ]
            ]
        );
    }
}
