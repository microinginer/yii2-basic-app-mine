<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 18.03.16
 * Time: 15:41
 */

namespace app\commands;


use app\models\User;
use Yii;
use yii\base\ErrorException;
use yii\console\Controller;

class AssignController extends Controller
{
    public function actionRole($username, $role)
    {
        if (!$model = User::findOne(['username' => $username])) {
            throw new ErrorException($username . " not found");
        }

        if (!$userRole = Yii::$app->authManager->getRole($role)) {
            throw new ErrorException($role . " not found");
        }

        Yii::$app->authManager->assign($userRole, $model->id);

        exit;
    }
}