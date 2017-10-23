<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'timeZone' => 'Europe/Kiev',
    'name' => 'ДОЛ Гагарина',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'gtrnUghQq6OCooFYXZZeZwJCmBlDhsHe',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
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
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/basic',
                'baseUrl' => '@web/themes/basic',
                'pathMap' => [
                    '@app/views' => '@app/themes/basic',
                    '@dektrium/user/views' => '@app/modules/backend/views/user'
                ],
            ],
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
            ],
        ],
        
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module', 
            'enableUnconfirmedLogin' => false,
            //'enableGeneratingPassword' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'controllerMap' => [
                'registration' => [
                    'class' => \dektrium\user\controllers\RegistrationController::className(),
                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_CONFIRM => function ($e) {
                        Yii::$app->response->redirect(array('/backend/uprofile/index'))->send();
                        Yii::$app->end();
                    }
                ],
                'security' => [
                    'class'  => 'dektrium\user\controllers\SecurityController',
                    'layout' => '@app/modules/backend/views/layouts/main-login',
                ],
                'admin' => [
                    'class'  => 'dektrium\user\controllers\AdminController',
                    'layout' => '@app/modules/backend/views/layouts/main',
                ],
            ],
            /*'modelMap' => [
                'User' => 'app\models\User',
            ],*/
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule',
            'layoutPath' => '@app/modules/backend/views/layouts',
            'layout' => 'main',
        ],
        'backend' => [
            'class' => 'app\modules\backend\Module',
            'layoutPath' => '@app/modules/backend/views/layouts',
            'layout' => 'main',

        ],
        'gridview' => ['class' => 'kartik\grid\Module']
    ],
    'controllerMap' => [
        'elfinder' => [
                'class' => 'mihaildev\elfinder\PathController',
                'access' => ['admin','cmanager','seller'],
                'root' => [
                    'path' => 'upload',
                    'name' => 'Files'
                ],
                'watermark' => [
                            'source'         => __DIR__.'/logo.png', // Path to Water mark image
                             'marginRight'    => 5,          // Margin right pixel
                             'marginBottom'   => 5,          // Margin bottom pixel
                             'quality'        => 95,         // JPEG image save quality
                             'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                             'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
                             'targetMinPixel' => 200         // Target image minimum pixel size
                ]
            ]
        ],                     
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
