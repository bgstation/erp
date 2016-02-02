<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */
/* @var $form CActiveForm */
?>

<div class="form">
    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>
    <div class="row">
        <h4>Resumo</h4>
        <div class="row">
            <label>Cliente</label>
            <input type="text" readonly value="<?= $model->cliente->nome ?>" />
        </div>
        <div class="row">
            <label>Placa do Carro</label>
            <input type="text" readonly value="<?= $model->clienteCarro->placa ?>" />
        </div>
        <div class="row">
            <label>Observação</label>
            <textarea type="text" readonly style="width: 300px; height: 150px"><?= $oLogOrdemServico->observacao ?></textarea>
        </div>
        <div class="row">
            <div>
                <h4>Itens da OS</h4>
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
                            <th>Serviços</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody id="tipo_item_1_adicionados">
                        <?= OrdemServicoHelper::renderItens(2, $model->ordemServicoItens, false) ?>
                    </tbody>
                </table>
            </div>
            <p><strong id="valorTotal">Total: R$ <?= FormatHelper::valorMonetario($valor_total) ?></strong></p>
        </div>
    </div>

    <div class="row os-escolher-formas-pagamento">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'ordem-servico-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <?php
        $this->renderPartial('_formas_pagamento', array(
            'form' => $form,
            'model' => $model,
            'atualizar' => $atualizar,
            'valor_total' => $valor_total,
            'oOrdemServicoTipoPagamento' => $oOrdemServicoTipoPagamento,
        ));
        ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'desconto') ?>
        <?= $form->textField($model, 'desconto', array('class' => 'monetario', 'disabled' => $atualizar ? 'disabled' : '')) ?>
        <?= $form->error($model, 'desconto') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($oLogOrdemServico, 'observacao') ?>
        <?= $form->textArea($oLogOrdemServico, 'observacao', array('rows' => 6, 'cols' => 50, 'value' => '', 'disabled' => $atualizar ? 'disabled' : '')) ?>
        <?= $form->error($oLogOrdemServico, 'observacao') ?>
    </div>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'buttonType' => 'submit',
            'label' => 'Finalizar',
            'htmlOptions' => array(
                'onclick' => 'finalizar()'
            ),
                )
        );
        ?>
    </div>

    <?= $form->errorSummary($model) ?>

    <?php $this->endWidget() ?>

</div>

<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
<script type="text/javascript">
    var valorTotalOri = <?= $valor_total ?>;
    var valorTotal = <?= $valor_total ?>;
    var desconto = 0;
    var atualizar = '<?= !empty($atualizar) ? $atualizar : FALSE ?>';
</script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/ordemServico/_finalizar.js"></script>
<script>
    $(document).ready(function () {
<?php if (!empty($model->desconto)): ?>
            var preDesconto = '<?= $model->desconto ?>';
            aplicaDesconto(preDesconto.replace('.', ','));
<?php endif; ?>
    })
</script>