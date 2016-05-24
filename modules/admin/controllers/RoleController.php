<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 17.03.16
 * Time: 17:09
 */

namespace app\modules\admin\controllers;


use yii\filters\AccessControl;
use yii\rbac\Item;
use yii\rbac\Role;
use yii\web\NotFoundHttpException;

class RoleController extends \dektrium\rbac\controllers\RoleController
{

    public function init()
    {
        parent::init();
        \Yii::$app->getModule('rbac')->detachBehavior('access');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                        ],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
}