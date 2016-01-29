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
            <!--            <//?php
                        foreach ($oProdutos as $produto) {
                            echo '<tr>';
                            echo '<td style="width: 50px">';
                            echo '<input class="selecionaItem" valor="' . $produto->preco . '" tipo_item="' . OrdemServicoItem::PRODUTO . '" item_id="' . $produto->id . '" type="checkbox" value="' . $produto->id . '" name="OrdemServicoItem[Item][' . OrdemServicoItem::PRODUTO . '][' . $produto->id . '][id]">';
                            echo '</td>';
                            echo '<td class="titulo item_' . OrdemServicoItem::PRODUTO . '_' . $produto->id . '">';
                            echo $produto->titulo;
                            echo '</td>';
                            echo '<td>';
                            echo '<input class="preco item_' . OrdemServicoItem::PRODUTO . '_' . $produto->id . '" disabled="disabled" type="text" value="' . $produto->preco . '" name="OrdemServicoItem[Item][' . OrdemServicoItem::PRODUTO . '][' . $produto->id . '][preco]">';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?//>-->
            <?php
            for ($i = 14000; $i < 14003; $i++) {
                $return = '<tr>';
                $return .= '<td style="width: 50px">';
                $return .= '<input class="selecionaItem" tipo_item="' . OrdemServicoItem::PRODUTO . '" item_id="0" identificador="' . $i . '" type="checkbox" value="0" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::PRODUTO . '][' . $i . '][id]">';
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
            <!--<//?= OrdemServicoHelper::renderItens(1, $model->ordemServicoItens) ?>-->
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
            <!--            <//?php
            //            foreach ($oServicos as $servico) {
            //                echo '<tr>';
            //                echo '<td style="width: 50px">';
            //                echo '<input class="selecionaItem" preco_variavel="'.$servico->preco_variavel.'" valor="' . $servico->preco . '" tipo_item="' . OrdemServicoItem::SERVICO . '" item_id="' . $servico->id . '" type="checkbox" value="' . $servico->id . '" name="OrdemServicoItem[Item][' . OrdemServicoItem::SERVICO . '][' . $servico->id . '][id]">';
            //                echo '</td>';
            //                echo '<td class="titulo item_' . OrdemServicoItem::SERVICO . '_' . $servico->id . '">' . $servico->titulo;
            //                echo '</td>';
            //                echo '<td>';
            //                echo '<input class="preco item_' . OrdemServicoItem::SERVICO . '_' . $servico->id . '" disabled="disabled" type="text" value="' . $servico->preco . '" name="OrdemServicoItem[Item][' . OrdemServicoItem::SERVICO . '][' . $servico->id . '][preco]">';
            //                echo '</td>';
            //                echo '</tr>';
            //            }
                        ?//>-->
            <?php
            for ($i = 14000; $i < 14003; $i++) {
                $return = '<tr>';
                $return .= '<td style="width: 50px">';
                $return .= '<input class="selecionaItem" tipo_item="' . OrdemServicoItem::SERVICO . '" item_id="0" identificador="' . $i . '" type="checkbox" value="0" name="LogItemNaoCadastrado[Item][' . OrdemServicoItem::SERVICO . '][' . $i . '][id]">';
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
            <!--<//?= OrdemServicoHelper::renderItens(2, $model->ordemServicoItens) ?>-->
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
    var valorTotal = parseFloat('<?= $valor_total ?>');
    var valorAtual;

    var habilitaCamposTextos = function (obj, checked) {
        if (checked && obj.preco_variavel == 1) {
            $(".item_" + obj.tipoItem + "_" + obj.itemId).removeAttr('disabled');
        } else {
            $(".item_" + obj.tipoItem + "_" + obj.itemId).attr('disabled', 'disabled');
        }
    }

    $(".preco").focus(function () {
        valorAtual = parseFloat($(this).val());
        $(this).val(null);
    }).blur(function () {
        var valorNovo = parseFloat($(this).val());
        if (valorAtual != valorNovo && $.isNumeric(valorNovo)) {
            valorTotal = valorTotal - valorAtual;
        } else {
            $(this).val(valorAtual);
            return false;
        }
        atualizaValor($(this).val(), true);
    });

    var atualizaValor = function (valor, checked) {
        if (valor.search(',') != -1) {
            valor = parseFloat(valor.replace('.', '').replace(',', '.'));
        } else {
            valor = parseFloat(valor);
        }
        if (checked) {
            valorTotal = valorTotal + parseFloat(valor);
        } else {
            valorTotal = valorTotal - parseFloat(valor);
        }
        $("#valor_total span").text(number_format(valorTotal, 2, ',', '.'));
    }

    var selecionaItens = function (element) {
        var objeto = montarObjeto(element);
        atualizaValor(objeto.valor, objeto.checked);
        habilitaCamposTextos(objeto, objeto.checked);
    }


    $(".selecionaItem").click(function () {
        selecionaItens($(this));
    });

</script>