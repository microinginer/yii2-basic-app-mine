<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'admin'],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'layout' => '@app/modules/admin/views/layouts/main',
            'controllerMap' => [
                'security' => 'app\modules\admin\controllers\SecurityController',
                'registration' => 'app\modules\admin\controllers\RegistrationController',
                'admin' => 'app\modules\admin\controllers\UserController',
            ],
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
            'layout' => '@app/modules/admin/views/layouts/main',
            'controllerMap' => [
                'role' => 'app\modules\admin\controllers\RoleController',
                'permission' => 'app\modules\admin\controllers\PermissionController',
            ],
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main',
        ],
        'atlantic' => [
            'class' => 'app\modules\atlantic\Module',
            'publicKey' => getenv('PUBLIC_API_KEY_ATLANTIC'),
            'privateKey' => getenv('PRIVATE_API_KEY_ATLANTIC'),
            'layout' => '@app/modules/admin/views/layouts/main',
        ],
        'post' => [
            'class' => 'app\modules\post\Module',
            'layout' => '@app/modules/admin/views/layouts/main',
        ],
    ],
    'components' => [
        'authClientCollection' => [
            'class' => yii\authclient\Collection::className(),
            'clients' => [
                'github' => [
                    'class' => 'dektrium\user\clients\GitHub',
                    'clientId' => getenv('GITHUB_CLIENT_ID'),
                    'clientSecret' => getenv('GITHUB_CLIENT_SECRET'),
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'yDFglh_bh40FQqD3YT-UKlvlrmQyDuXr',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/modules/admin/views/user',
                    '@dektrium/user/views/admin' => '@app/modules/admin/views/users',
                    '@dektrium/rbac/views/role' => '@app/modules/admin/views/rbac/role',
                    '@dektrium/rbac/views/permission' => '@app/modules/admin/views/rbac/permission',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_DEBUG) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*', '127.0.0.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*', '127.0.0.1'],
    ];
}

$config['bootstrap'][] = 'post';
$config['bootstrap'][] = 'atlantic';

return $config;
