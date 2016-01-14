<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 dashboard-card">
            <div class="panel panel-primary">
                <a href="<?= Yii::app()->createUrl('cliente/create') ?>">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-plus fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size:30px;">Cadastrar Cliente</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 dashboard-card">
            <div class="panel panel-green">
                <a href="<?= Yii::app()->createUrl('cliente/admin') ?>">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-search fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size:30px;">Buscar Cliente</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 dashboard-card">
            <div class="panel panel-yellow">
                <a href="<?= Yii::app()->createUrl('compra/create') ?>">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size:30px;">Cadastrar Compra</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 dashboard-card">
            <div class="panel panel-primary">
                <a href="<?= Yii::app()->createUrl('servico/create') ?>">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-wrench fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size:30px;">Cadastrar Serviço</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 dashboard-card">
            <div class="panel panel-red">
                <a href="<?= Yii::app()->createUrl('despesa/create') ?>">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size:30px;">Cadastrar Despesa</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
</section>