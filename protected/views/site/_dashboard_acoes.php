<?php if (Yii::app()->user->checkAccess('cliente/create')) : ?>
    <div class="col-lg-2 col-md-6 col-sm-6 dashboard-card">
        <div class="panel panel-primary">
            <a href="<?= Yii::app()->createUrl('cliente/create') ?>">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <span><i class="fa fa-user-plus fa-2x"></i> Cadastrar Cliente</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>
<?php if (Yii::app()->user->checkAccess('cliente/admin')) : ?>
    <div class="col-lg-2 col-md-6 col-sm-6 dashboard-card">
        <div class="panel panel-green">
            <a href="<?= Yii::app()->createUrl('cliente/admin') ?>">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <span><i class="fa fa-search fa-2x"></i> Buscar Cliente</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div><?php endif; ?>
<?php if (Yii::app()->user->checkAccess('ordemServico/create')) : ?>
    <div class="col-lg-2 col-md-6 col-sm-6 dashboard-card">
        <div class="panel panel-primary">
            <a href="<?= Yii::app()->createUrl('ordemServico/create') ?>">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <span><i class="fa fa-file-text-o fa-2x"></i> Cadastrar OS</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div><?php endif; ?>
<?php if (Yii::app()->user->checkAccess('compra/create')) : ?>
    <div class="col-lg-2 col-md-6 col-sm-6 dashboard-card">
        <div class="panel panel-yellow">
            <a href="<?= Yii::app()->createUrl('compra/create') ?>">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <span><i class="fa fa-shopping-cart fa-2x"></i> Cadastrar Compra</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div><?php endif; ?>
<?php if (Yii::app()->user->checkAccess('servico/create')) : ?>
    <div class="col-lg-2 col-md-6 col-sm-6 dashboard-card">
        <div class="panel panel-primary">
            <a href="<?= Yii::app()->createUrl('servico/create') ?>">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <span><i class="fa fa-wrench fa-2x"></i> Cadastrar Serviço</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>
<?php if (Yii::app()->user->checkAccess('despesa/create')) : ?>
    <div class="col-lg-2 col-md-6 col-sm-6 dashboard-card">
        <div class="panel panel-red">
            <a href="<?= Yii::app()->createUrl('despesa/create') ?>">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <span><i class="fa fa-money fa-2x"></i> Cadastrar Despesa</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>