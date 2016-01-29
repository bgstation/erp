<div>
    <h4>Itens da OS</h4>
    <table class="acl_section">
        <thead>
            <tr>
                <th style="width: 50px"></th>
                <th>Produto</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id="tipo_item_1_adicionados">
            <?= OrdemServicoHelper::renderItensOS(OrdemServicoItem::PRODUTO, $oProdutos, $model->ordemServicoItens) ?>
            <?php
            for ($i = 14000; $i < 14003; $i++) {
                $return = '<tr>';
                $return .= '<td style="width: 50px">';
                $return .= '<input preco_variavel="1" class="selecionaItem" tipo_item="' . OrdemServicoItem::PRODUTO . '" item_id="0" identificador="' . $i . '" type="checkbox" value="0" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::PRODUTO . '][' . $i . '][id]">';
                $return .= '</td>';
                $return .= '<td>';
                $return .= '<input placeholder="Outros" disabled="disabled" class="titulo item_' . OrdemServicoItem::PRODUTO . '_' . $i . '" tipo_item="' . OrdemServicoItem::PRODUTO . '" item_id="0" type="text" value="" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::PRODUTO . '][' . $i . '][titulo]">';
                $return .= '</td>';
                $return .= '<td>';
                $return .= '<input class="preco item_' . OrdemServicoItem::PRODUTO . '_' . $i . '" disabled="disabled" type="text" value="0" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::PRODUTO . '][' . $i . '][preco]">';
                $return .= '</td>';
                $return .= '</tr>';
                echo $return;
            }
            ?>
        </tbody>
    </table>
</div>
<div>
    <table class="acl_section">
        <thead>
            <tr>
                <th style="width: 50px"></th>
                <th>Serviço</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id="tipo_item_2_adicionados">
            <?= OrdemServicoHelper::renderItensOS(OrdemServicoItem::SERVICO, $oServicos, $model->ordemServicoItens) ?>
            <?php
            for ($i = 14000; $i < 14003; $i++) {
                $return = '<tr>';
                $return .= '<td style="width: 50px">';
                $return .= '<input preco_variavel="1" class="selecionaItem" tipo_item="' . OrdemServicoItem::SERVICO . '" item_id="0" identificador="' . $i . '" type="checkbox" value="0" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::SERVICO . '][' . $i . '][id]">';
                $return .= '</td>';
                $return .= '<td>';
                $return .= '<input placeholder="Outros" disabled="disabled" class="titulo item_' . OrdemServicoItem::SERVICO . '_' . $i . '" tipo_item="' . OrdemServicoItem::SERVICO . '" item_id="0" type="text" value="" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::SERVICO . '][' . $i . '][titulo]">';
                $return .= '</td>';
                $return .= '<td>';
                $return .= '<input class="preco item_' . OrdemServicoItem::SERVICO . '_' . $i . '" disabled="disabled" type="text" value="0" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::SERVICO . '][' . $i . '][preco]">';
                $return .= '</td>';
                $return .= '</tr>';
                echo $return;
            }
            ?>
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

<script>
    var valorTotal = 0;
    var valorAtual;
</script>