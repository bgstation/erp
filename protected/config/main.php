<?php

Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');

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
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'root',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    'components' => array(
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'authManager' => array(
            'class' => 'application.components.UserRole',
        ),
        'user' => array(
            'class' => 'application.components.WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
        ),
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=erp',
            'emulatePrepare' => false,
            'enableProfiling' => false,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8'
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
