<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Ordens de Serviço' => Yii::app()->createUrl('ordemServico/admin'),
        $model->id
    ),
));
?>

<h1>Ordem de Serviço: <?= $model->id ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'cliente_id',
            'value' => !empty($model->cliente_id) ? $model->cliente->nome : '',
        ),
        array(
            'name' => 'cliente_carro_id',
            'value' => !empty($model->cliente_carro_id) ? strtoupper($model->clienteCarro->placa) : '',
        ),
        'observacao',
        array(
            'name' => 'desconto',
            'value' => !empty($model->desconto) ? 'R$ ' . FormatHelper::valorMonetario($model->desconto) : '',
        ),
        array(
            'label' => 'Valor pago',
            'value' => "R$ " . FormatHelper::valorMonetario($model->getValorTotal() - $model->desconto),
        ),
        array(
            'name' => 'excluido',
            'value' => $model->excluido == 0 ? 'Não' : 'Sim',
        ),
    ),
));
?>

<h3>Resumo</h3>
<div>
    <table class="acl_section">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id="tipo_item_1_adicionados">
            <?= OrdemServicoHelper::renderItens(1, $model->ordemServicoItens, false) ?>
        </tbody>
    </table>
</div>
<div>
    <table class="acl_section">
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id="tipo_item_2_adicionados">
            <?= OrdemServicoHelper::renderItens(2, $model->ordemServicoItens, false) ?>
        </tbody>
    </table>
</div>

<div>
    <table class="acl_section">
        <thead>
            <tr>
                <th>Forma de pagamento</th>
                <th>Valor</th>
                <th>Parcelas</th>
            </tr>
        </thead>
        <tbody id="tipo_item_2_adicionados">
            <?php
            foreach ($model->ordemServicoTipoPagamento as $formaPagamento) {
                echo '<tr>';
                echo '<td>';
                echo $oOrdemServicoFormaPagamento->aFormasPagamento[$formaPagamento->forma_pagamento_id];
                echo '</td>';
                echo '<td>';
                echo 'R$ ' . FormatHelper::valorMonetario($formaPagamento->valor);
                echo '</td>';
                echo '<td>';
                echo!empty($formaPagamento->parcelas) ? $formaPagamento->parcelas . 'x' : 'À vista';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>


<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('ordemServico/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir todas') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('ordemServico/update') && $model->getStatus() == 1) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar Ordem de Serviço') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('ordemServico/finalizar') && $model->getStatus() == 1) : ?>
        <li><a class="btn" href="<?= $this->createUrl('finalizar', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Finalizar Ordem de Serviço') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('ordemServico/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Abrir Nova Ordem de Serviço') ?></a></li>
        <?php endif; ?>
</ul>