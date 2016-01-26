<section>
    <div class="container">
        <div class="row">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <?php if (Yii::app()->user->checkAccess('dashboard/avisos')) : ?>
            <div class="row">
                <h2>Avisos</h2>
                <?= $this->renderPartial('_dashboard_avisos', array('oLogItemNaoCadastrado' => $oLogItemNaoCadastrado)) ?>
            </div>
            <hr>
        <?php endif; ?>
        <?php if (Yii::app()->user->checkAccess('ordemServico/admin')) : ?>
            <div class="row">
                <h2>Ordens de Serviço</h2>
                <?= $this->renderPartial('_dashboard_ordens_servico', array('oOrdemServico' => $oOrdemServico, 'exibeFormularioBusca' => $exibeFormularioBusca)) ?>
            </div>
            <hr>
        <?php endif; ?>
        <?php if (Yii::app()->user->checkAccess('dashboard/acoes')) : ?>
            <div class="row">
                <h2>Ações</h2>
                <?= $this->renderPartial('_dashboard_acoes') ?>
            </div>
        <?php endif; ?>
</section>