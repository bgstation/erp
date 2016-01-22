<?php

Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/yiibooster');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Fashion Car',
    'defaultController' => 'site/index',
    'preload' => array('log'),
    'language' => 'pt_br',
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.extensions.bootstrap.widgets.*',
        'application.extensions.bootstrap.helpers.*',
        'application.extensions.yiibooster.helpers.*',
        'application.extensions.yiibooster.views.*',
        'application.extensions.yiibooster.widgets.*',
    ),
    'modules' => array(
    ),
    'components' => array(
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'booster' => array(
            'class' => 'booster.components.Booster',
        ),
        'authManager' => array(
            'class' => 'application.components.UserRole',
        ),
        'user' => array(
            'class' => 'application.components.WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=bgstatio_fashioncar',
            'emulatePrepare' => false,
            'enableProfiling' => false,
            'username' => 'bgstatio_site',
            'password' => ']!ygr~xo7V*m',
            'charset' => ']!ygr~xo7V*m'
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    'params' => array(
        'projeto' => 'fashion_car',
        'diretorioImagens' => 'images/',
        'adminEmail' => 'webmaster@example.com',
    ),
);
