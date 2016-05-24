<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 17.03.16
 * Time: 12:17
 */

namespace app\widgets\social;


use dektrium\user\widgets\Connect;
use yii\bootstrap\Html;

class SocialConnect extends Connect
{
    private $iconClasses = [
        'facebook' => 'fa-facebook',
        'github' => 'fa-github',
        'vkontakte' => 'fa-vk',
    ];

    /**
     * Renders the main content, which includes all external services links.
     */
    protected function renderMainContent()
    {
        echo Html::beginTag('div', ['class' => 'social-auth-links text-center']);
        foreach ($this->getClients() as $externalService) {
            $text = Html::tag('i', '', ['class' => 'auth-icon fa ' .
                (!empty($this->iconClasses[$externalService->getName()]) ? $this->iconClasses[$externalService->getName()] : ''),
            ]);
            $text .= $externalService->getTitle();

            $this->clientLink($externalService, $text, ['class' => 'btn btn-block btn-social btn-flat btn-' . $externalService->getName()]);
        }
        echo Html::endTag('div');
    }

    public function init()
    {
        if ($this->getClients()) {
            SocialConnectAssets::register($this->view);
        }
    }
}