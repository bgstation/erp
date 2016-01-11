<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/site.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/produto/_form.css" />
        
        <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/biblioteca.js"></script>
        
        <!-- Font-Awesome -->
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/font-awesome-4.5.0/css/font-awesome.min.css" />
        <?php Yii::app()->bootstrap->register() ?>
        <title><?= CHtml::encode($this->pageTitle) ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo">
                    <a href="<?= Yii::app()->createUrl('site/index') ?>">
                        <?= CHtml::image(Yii::app()->params['diretorioImagens'] . 'logo.png', 'fashion car') ?>
                    </a>
                </div>
            </div>

            <div id="mainmenu">
                <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type' => 'tabs',
                    'stacked' => false,
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'Cadastro', 'items' => array(
                                array('label' => 'Cores', 'url' => array('cor/admin'), 'visible' => Yii::app()->user->checkAccess('cor/admin')),
                                array('label' => 'Clientes', 'url' => array('cliente/admin'), 'visible' => Yii::app()->user->checkAccess('cliente/admin')),
                                array('label' => 'Marcas', 'url' => array('marca/admin'), 'visible' => Yii::app()->user->checkAccess('marca/admin')),
                                array('label' => 'Modelos', 'url' => array('modelo/admin'), 'visible' => Yii::app()->user->checkAccess('modelo/admin')),
                                array('label' => 'Ordens de serviço', 'url' => array('produto/admin'), 'visible' => Yii::app()->user->checkAccess('ordemServico/admin')),
                                array('label' => 'Produtos', 'url' => array('produto/admin'), 'visible' => Yii::app()->user->checkAccess('produto/admin')),
                                array('label' => 'Serviços', 'url' => array('servico/admin'), 'visible' => Yii::app()->user->checkAccess('servico/admin')),
                                array('label' => 'Tipos de Usuários', 'url' => array('aclTipoUsuario/admin'), 'visible' => Yii::app()->user->checkAccess('aclTipoUsuario/admin')),
                                array('label' => 'Usuários', 'url' => array('usuario/admin'), 'visible' => Yii::app()->user->checkAccess('usuario/admin')),
                            ), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'itemOptions' => array('style' => 'float:right;'))
                    ),
                ));
                ?>
            </div>
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?>
            <?php endif ?>

            <?= $content ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?= date('Y') ?> by RPsystem. Todos os direitos reservados.
            </div>

        </div>

    </body>
</html>
