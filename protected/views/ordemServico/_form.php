<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ordem-servico-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

    <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
        <li role="presentation" class="">
            <a href="#cliente" id="cliente-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Cliente</a>
        </li> 
        <li role="presentation" class="active">
            <a href="javascript:void(0)" role="tab" id="servicos-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Serviços</a>
        </li>
        <li role="presentation" class="">
            <a href="javascript:void(0)" disabled="disabled" role="tab" id="resumo-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Resumo</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">

        <div role="tabpanel" class="tab-pane fade" id="cliente" aria-labelledby="cliente-tab">
            <?=
            $this->renderPartial('_cliente', array(
                'form' => $form,
                'model' => $model,
                'oClientes' => $oClientes,
            ));
            ?>
        </div>

        <div role="tabpanel" class="tab-pane fade active in" id="servicos" aria-labelledby="servicos-tab">
            <?php
            $this->renderPartial('_servicos', array(
                'form' => $form,
                'model' => $model,
                'valor_total' => $valor_total,
                'oOrdemServicoItem' => $oOrdemServicoItem,
                'oLogItemNaoCadastrador' => $oLogItemNaoCadastrador,
                'oServicos' => $oServicos,
                'oProdutos' => $oProdutos,
            ));
            ?>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="resumo" aria-labelledby="resumo-tab">
            <?php
            $this->renderPartial('_resumo', array(
                'model' => $model,
            ));
            ?>
        </div>

    </div>
    <?= $form->errorSummary($model) ?>

    <?php $this->endWidget() ?>
</div>

<?php
Yii::app()->clientScript->registerScript('helpers', '
            var clienteId = "' . $model->cliente_id . '";
            var clienteCarroId = "' . $model->cliente_carro_id . '";
            var urlGetJsonClienteCarros = "' . Yii::app()->createUrl('clienteCarro/getDataJson') . '";
            var urlGetJsonItensPorTipo = " ' . Yii::app()->createUrl('ordemServico/getItensPorTipoJson') . '";
        ', CClientScript::POS_HEAD);
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/ordemServico/_form.js"></script>
<script type="text/javascript">
<?php if (!empty($model->ordemServicoItens)): ?>
    <?php foreach ($model->ordemServicoItens as $model) : ?>
        <?php if ($model->tipo_item_id == 1): ?>
                aProdutos.push(parseInt('<?= $model->item_id ?>'));
        <?php endif; ?>
        <?php if ($model->tipo_item_id == 2): ?>
                aServicos.push(parseInt('<?= $model->item_id ?>'));
        <?php endif ?>
    <?php endforeach; ?>
<?php endif ?>
</script>
