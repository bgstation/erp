<div class="row">
    <?= $form->labelEx($oOrdemServicoItem, 'tipo_item_id') ?>
    <?php
    $this->widget('ext.select2.ESelect2', array(
        'model' => $oOrdemServicoItem,
        'attribute' => 'tipo_item_id',
        'data' => $oOrdemServicoItem->aTipoItem,
        'options' => array(
            'placeholder' => 'Tipo do item',
            'allowClear' => false,
        ),
        'htmlOptions' => array(
            'id' => 'select2_tipo_item_id',
        ),
    ));
    ?>
    <?= $form->error($oOrdemServicoItem, 'tipo_item_id') ?>
</div>


<div class="row oculta">
    <?= $form->labelEx($oOrdemServicoItem, 'item_id') ?>
    <?= $form->hiddenField($oOrdemServicoItem, 'item_id') ?>
    <?= $form->error($oOrdemServicoItem, 'item_id') ?>
</div>

<div class="row itens_nao_cadastrados oculta">
    <?= $form->textField($oLogItemNaoCadastrador, 'titulo', array('placeholder' => 'Descrição')) ?>
    <?= $form->textField($oLogItemNaoCadastrador, 'preco', array('placeholder' => 'Preço', 'class' => 'preco')) ?>
</div>

<div class="row buttons oculta" id="add_item">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'size' => 'medium',
        'buttonType' => 'button',
        'label' => 'Adicionar',
        'htmlOptions' => array(
            'id' => 'btn_add_item'
        ),
            )
    );
    ?>
</div>

<input type="hidden" name="OrdemServicoItem[Produto]" id="OrdemServicoItem_produtos" />
<input type="hidden" name="OrdemServicoItem[Servico]" id="OrdemServicoItem_servicos" />

<div>
    <h4>Itens da OS</h4>
    <table class="acl_section">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody id="tipo_item_1_adicionados">
            <?= OrdemServicoHelper::renderItens(1, $model->ordemServicoItens) ?>
        </tbody>
    </table>
</div>
<div>
    <table class="acl_section">
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Preço</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody id="tipo_item_2_adicionados">
            <?= OrdemServicoHelper::renderItens(2, $model->ordemServicoItens) ?>
        </tbody>
    </table>
</div>
<p id="valor_total" total="<?= $valor_total ?>">Total: R$ <span><?= FormatHelper::valorMonetario($valor_total) ?></span></p>
<div class="row buttons">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'danger',
        'size' => 'medium',
        'buttonType' => 'button',
        'label' => 'Voltar',
        'htmlOptions' => array(
            'onclick' => 'alterarTab("servicos", "cliente")'
        ),
            )
    );
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'size' => 'medium',
        'buttonType' => 'button',
        'label' => 'Continuar',
        'htmlOptions' => array(
            'onclick' => 'alterarTab("servicos", "resumo")'
        ),
            )
    );
    ?>
</div>