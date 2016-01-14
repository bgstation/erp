<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    'preload' => array('log'),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.extensions.bootstrap.widgets.*',
        'application.extensions.bootstrap.helpers.*',
    ),
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost:8889;dbname=erp',
            'emulatePrepare' => false,
            'enableProfiling' => false,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8'
        ),
        /*'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=erp',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ),*/
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
);
