<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 21.03.16
 * Time: 15:54
 */

namespace app\modules\admin\controllers;


use dektrium\user\controllers\AdminController;
use yii\filters\AccessControl;

class UserController extends AdminController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index', 'update', 'create', 'block',
                            'delete', 'info', 'update-profile', 'assignments', 'confirm',
                        ],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
}