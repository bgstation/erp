<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <title><?= CHtml::encode($this->pageTitle) ?></title>

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/site.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/produto/_form.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/font-awesome-4.5.0/css/font-awesome.min.css" />
        
        <?php Yii::app()->bootstrap->register() ?>
    </head>

    <body>
        <div class="container" id="page">
            <?php if (!Yii::app()->user->isGuest) { ?>
                <div id="mainmenu">
                    <?php $this->renderPartial('/site/menu') ?>
                </div>
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?>
                <?php endif ?>
            <?php } else { ?>
                <div style="margin-top:20px;">
                    <?= CHtml::image(Yii::app()->params['diretorioImagens'] . 'logo.png', 'fashion car', array('style' => 'text-align:center')) ?>
                </div>
            <?php } ?>
            <?= $content ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?= date('Y') ?> by RPsystem. Todos os direitos reservados.
            </div>
        </div>
    </body>
</html>
