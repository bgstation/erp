<div class="row">
    <label>Cliente</label>
    <input type="text" disabled="disabled" id="resumo_nome_cliente" value=""/>
</div>
<div class="row">
    <label>Placa do Carro</label>
    <input type="text" disabled="disabled" id="resumo_cliente_carro_placa" value=""/>
</div>

<div>
    <h4>Itens da OS</h4>
    <table class="acl_section">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id="tipo_item_<?= OrdemServicoItem::PRODUTO ?>_adicionados" class="resumo">
            
            <!--<//?= OrdemServicoHelper::renderItens(1, $model->ordemServicoItens, false) ?>-->
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
        <tbody id="tipo_item_<?= OrdemServicoItem::SERVICO ?>_adicionados" class="resumo">
            <!--<//?= OrdemServicoHelper::renderItens(2, $model->ordemServicoItens, false) ?>-->
        </tbody>
    </table>
</div>

<div class="row buttons">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'buttonType' => 'submit',
        'label' => $model->isNewRecord ? 'Abrir ordem de serviço' : 'Atualizar',
        'htmlOptions' => array(
            'onclick' => 'acoesFinalizar()'
        ),
            )
    );
    ?>
</div>