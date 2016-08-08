<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id'                  => 'app-frontend',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components'          => [
        'user'         => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'   => [
            'class'               => 'yii\web\UrlManager',
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            'enableStrictParsing' => false,
            'rules'               => [
                '/'                                                  => 'site/index',
                'sitemap.xml'                                        => 'site/sitemap',
                'ads/<alias:[\w-]+>'                                 => 'site/showadvert',
                'bboards/<city:[\w-]+>'                              => 'site/bboardcity',
                'bboards/<city:[\w-]+>/<alias:[\w-]+>'               => 'site/bboard',
                'bboards/<city:[\w-]+>/<alias:[\w-]*>/<type:[\w-]+>' => 'site/bboard',
                'advert/create'                                      => 'site/createadvert',
                'bboard/load'                                        => 'site/loadadvert',
                '<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>'       => '<controller>/<action>',
                '<controller:[\w-]+>/<action:[\w-]+>'                => '<controller>/<action>',
            ],
        ],
        'vkapi'        => [
            'class' => 'common\components\VkontakteComponent',
        ],
    ],
    'params'              => $params,
];
