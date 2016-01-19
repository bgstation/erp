<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type' => 'inverse',
    'brand' => CHtml::image(Yii::app()->params['diretorioImagens'] . 'logo.png', 'fashion car'),
    'brandUrl' => Yii::app()->createUrl(Yii::app()->defaultController),
    'collapse' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
                array('label' => 'Home', 'url' => array('site/index'), 'active' => true),
                array('label' => 'Cadastro', 'items' => array(
                        array('label' => 'Clientes', 'url' => array('cliente/admin'), 'visible' => Yii::app()->user->checkAccess('cliente/admin')),
                        array('label' => 'Compras', 'url' => array('compra/admin'), 'visible' => Yii::app()->user->checkAccess('compra/admin')),
                        array('label' => 'Cores', 'url' => array('cor/admin'), 'visible' => Yii::app()->user->checkAccess('cor/admin')),
                        array('label' => 'Despesas', 'url' => array('despesa/admin'), 'visible' => Yii::app()->user->checkAccess('despesa/admin')),
                        array('label' => 'Marcas', 'url' => array('marca/admin'), 'visible' => Yii::app()->user->checkAccess('marca/admin')),
                        array('label' => 'Modelos', 'url' => array('modelo/admin'), 'visible' => Yii::app()->user->checkAccess('modelo/admin')),
                        array('label' => 'Ordens de Serviço', 'url' => array('ordemServico/admin'), 'visible' => Yii::app()->user->checkAccess('ordemServico/admin')),
                        array('label' => 'Produtos', 'url' => array('produto/admin'), 'visible' => Yii::app()->user->checkAccess('produto/admin')),
                        array('label' => 'Serviços', 'url' => array('servico/admin'), 'visible' => Yii::app()->user->checkAccess('servico/admin')),
                        array('label' => 'Tipos de despesa', 'url' => array('tipoDespesa/admin'), 'visible' => Yii::app()->user->checkAccess('tipoDespesa/admin')),
                        array('label' => 'Tipos de produto', 'url' => array('tipoProduto/admin'), 'visible' => Yii::app()->user->checkAccess('tipoProduto/admin')),
                        array('label' => 'Tipos de usuário', 'url' => array('aclTipoUsuario/admin'), 'visible' => Yii::app()->user->checkAccess('aclTipoUsuario/admin')),
                        array('label' => 'Usuários', 'url' => array('usuario/admin'), 'visible' => Yii::app()->user->checkAccess('usuario/admin')),
                    ), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Relatórios', 'items' => array(
                        array('label' => 'Financeiro', 'url' => array('financeiro/admin')),
                        array('label' => 'Estoque', 'url' => array('produto/estoque')),
                    ), 'visible' => !Yii::app()->user->isGuest),
            ),
        ),
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => array(
                array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
            ),
        ),
    ),
));
?>