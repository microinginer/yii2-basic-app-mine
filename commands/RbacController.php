<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 16.03.16
 * Time: 22:33
 */

namespace app\commands;


use app\rbac\AuctionRule;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionCreateRole($name)
    {
        $role = Yii::$app->authManager->createRole($name);
        $role->description = Yii::t('app', 'Administrator');
        Yii::$app->authManager->add($role);
    }
}