var identificador = 1500;
var aProdutos = new Array;
var aServicos = new Array;
var aItensNaoCadastrados = [];

$(document).ready(function () {
    $('.preco').mask("#.##0,00", {reverse: true});
    
    $('.selecionaItem').each(function () {
        if (this.checked) {
            selecionaItens($(this));
        }
    });

    if (clienteId !== "") {
        $("#OrdemServico_cliente_carro_id").parents('div').css('display', '');
        carregaSelect2Carros(clienteId);
        if (clienteCarroId !== "") {
            $("#OrdemServico_cliente_carro_id").val(clienteCarroId);
        }
    }
});
//
//var acoesFinalizar = function () {
//    $('#OrdemServicoItem_produtos').val(aProdutos);
//    $('#OrdemServicoItem_servicos').val(aServicos);
//    if (aItensNaoCadastrados.length > 0) {
//        $('.itens_nao_cadastrados input').remove();
//        $.each(aItensNaoCadastrados, function (key, obj) {
//            $('.itens_nao_cadastrados').append('<input type="hidden" name="LogItemNaoCadastrado[' + obj.tipoItem + '][' + obj.identificador + '][titulo]" value="' + obj.titulo + '" />');
//            $('.itens_nao_cadastrados').append('<input type="hidden" name="LogItemNaoCadastrado[' + obj.tipoItem + '][' + obj.identificador + '][preco]" value="' + obj.preco + '" />');
//        });
//    }
//}



//var removerItem = function (tipoItem, itemId, identificador, preco) {
//    if ((tipoItem == 1 || tipoItem == 2) && itemId != 0) {
//        if (tipoItem == 1) {
//            var index = aProdutos.indexOf(itemId);
//            if (index != -1) {
//                aProdutos.splice(index, 1);
//            }
//        } else if (tipoItem == 2) {
//            var index = aServicos.indexOf(itemId);
//            if (index != -1) {
//                aServicos.splice(index, 1);
//            }
//        }
//    } else {
//        $.each(aItensNaoCadastrados, function (key, obj) {
//            if (obj.identificador == identificador) {
//                aItensNaoCadastrados.splice(key, 1);
//            }
//        });
//    }
//    $('tr[identificador=' + tipoItem + '_' + identificador + ']').remove();
//    var novoValor = parseFloat($("#valor_total").attr('total')) - parseFloat(preco);
//    atualizaValor(novoValor);
//}

//var getCodigoHtml = function (obj, colunaRemover) {
//    var html = '';
//    html += '<tr identificador="' + obj.tipoItem + '_' + obj.identificador + '">';
//    html += '<td>' + obj.titulo + '</td>';
//    html += '<td> R$' + number_format(obj.preco, 2, ',', '.') + '</td>';
//    if (colunaRemover) {
//        html += '<td>';
//        html += '<a href="javascript:void(0)" class="remove" onclick="removerItem(' + obj.tipoItem + ', ' + obj.itemId + ', ' + obj.identificador + ', ' + obj.preco + ')">';
//        html += '<i class="fa fa-times"></i>';
//        html += '</a>';
//        html += '</td>';
//    }
//    html += '</tr>';
//    return html;
//}

//var adicionarItem = function (tipoItem, itemId, obj) {
//    if (itemId !== "" && tipoItem !== "") {
//        if (obj === undefined) {
//            var objItem = $('#' + tipoItem + '_' + itemId);
//            var obj = new Object();
//            obj.titulo = objItem.attr('text');
//            obj.preco = objItem.attr('preco');
//            obj.identificador = identificador;
//            obj.itemId = itemId;
//            obj.tipoItem = tipoItem;
//        }
//        if (tipoItem == 1)
//            aProdutos.push(parseInt(obj.itemId));
//        if (tipoItem == 2)
//            aServicos.push(parseInt(obj.itemId));
//        $('#tipo_item_' + tipoItem + '_adicionados .sem_item').remove();
//        $('#tipo_item_' + tipoItem + '_adicionados').append(getCodigoHtml(obj, true));
//        $('#tipo_item_' + tipoItem + '_adicionados.resumo').append(getCodigoHtml(obj, false));
//        var novoValor = parseFloat($("#valor_total").attr('total')) + parseFloat(obj.preco);
//        atualizaValor(novoValor);
//        identificador++;
//    }
//}

//var adicionarItemNaoCadastrado = function (tipoItem) {
//    var titulo = $('#LogItemNaoCadastrado_titulo').val();
//    var preco = parseFloat($('#LogItemNaoCadastrado_preco').val().replace('.', '').replace(',', '.'));
//    var objTemp = new Object();
//    objTemp.titulo = titulo;
//    objTemp.preco = preco;
//    objTemp.tipoItem = tipoItem;
//    objTemp.identificador = identificador;
//    objTemp.itemId = 0;
//    aItensNaoCadastrados.push(objTemp);
//    identificador++;
//    adicionarItem(tipoItem, 0, objTemp);
//}
//
//var checarNaoCadastrado = function (itemId) {
//    $('#LogItemNaoCadastrado_titulo').val(null);
//    $('#LogItemNaoCadastrado_preco').val(null);
//    if (itemId == 0) {
//        $('.itens_nao_cadastrados').removeClass('oculta');
//    } else {
//        $('.itens_nao_cadastrados').addClass('oculta');
//    }
//}

var checaMarcado = function () {
    var retorno = false;
    $('.selecionaItem').each(function () {
        if (this.checked) {
            retorno = true;
        }
    });
    return retorno;
}

var montarObjeto = function (element) {
    var obj = new Object();
    obj.preco_variavel = element.attr('preco_variavel');
    obj.itemId = element.attr('item_id');
    obj.tipoItem = element.attr('tipo_item');
    if (obj.itemId == 0) {
        obj.itemId = element.attr('identificador');
    }
    obj.titulo = $('.titulo.item_' + obj.tipoItem + '_' + obj.itemId).val();
    if (obj.titulo == '') {
        obj.titulo = $('.titulo.item_' + obj.tipoItem + '_' + obj.itemId).text();
    }
    obj.valor = $('.preco.item_' + obj.tipoItem + '_' + obj.itemId).val();
    obj.checked = element.is(':checked');
    return obj;
}

var gerarResumo = function (obj) {
    var html = '';
    html += '<tr id="resumo_' + obj.tipoItem + '_' + obj.itemId + '">';
    html += '<td>';
    html += obj.titulo;
    html += '</td>';
    html += '<td>';
    html += obj.valor;
    html += '</td>';
    html += '</tr>';
    $('#tipo_item_' + obj.tipoItem + '_adicionados.resumo').append(html);
}

var alterarTab = function (atual, passoEscolhido) {
    if (atual == "cliente") {
        if ($('#select2_cliente_id').val() === "" || $("#OrdemServico_cliente_carro_id").val() === "") {
            alert("Favor escolher o cliente e o carro!");
            return false;
        }
    } else if (atual == 'servicos') {
        if (!checaMarcado()) {
            alert("Selecione ao menos ou item!");
            return false;
        }
        if (passoEscolhido == 'resumo') {
            $("input:checked").each(function () {
                gerarResumo(montarObjeto($(this)));
            });
            $("#resumo_nome_cliente").val($("#s2id_select2_cliente_id span").text());
            $("#resumo_cliente_carro_placa").val($("#s2id_OrdemServico_cliente_carro_id span").text());
        }
    }
    $('#' + passoEscolhido + '-tab').attr("href", "#" + passoEscolhido);
    $('#' + passoEscolhido + '-tab').trigger("click");
}

var carregaSelect2Carros = function (clienteId) {
    $('#OrdemServico_cliente_carro_id').parents('div').removeClass('oculta');
    $.ajax({
        url: urlGetJsonClienteCarros,
        type: 'POST',
        data: {
            clienteId: clienteId,
        },
        success: function (data) {
            $('#OrdemServico_cliente_carro_id').select2({
                data: $.parseJSON(data)
            });
        }
    });
}

//var carregaItens = function (tipoItemId) {
//    $('#OrdemServicoItem_item_id').parents('div').removeClass('oculta');
//    $('.itens_nao_cadastrados').addClass('oculta');
//    $.ajax({
//        url: urlGetJsonItensPorTipo,
//        type: 'POST',
//        data: {
//            tipoItemId: tipoItemId
//        },
//        success: function (data) {
//            $('#OrdemServicoItem_item_id').select2({
//                formatResult: format,
//                formatSelection: format2,
//                data: $.parseJSON(data),
//                escapeMarkup: function (m) {
//                    return m;
//                }
//            });
//            $('#add_item').removeClass('oculta');
//        }
//    });
//}
//
//function format(data) {
//    if (!data.id) {
//        return data.text;
//    }
//    var state = $('<span>' + data.text + '</span><span objId="' + data.id + '" text="' + data.text + '"  id="' + data.tipoItem + '_' + data.id + '" preco=' + data.preco + ' style="float: right">R$' + number_format(data.preco, 2, ',', '.') + '</span>');
//    return state;
//}
//
//function format2(item) {
//    if (!item.id) {
//        return item.text;
//    }
//    var state = $('<span objId="' + item.id + '" text="' + item.text + '"  id="' + item.tipoItem + '_' + item.id + '" preco=' + item.preco + '>' + item.text + '</span>');
//    return state;
//}

//$('#btn_add_item').click(function () {
//    var tipoItemId = $('#select2_tipo_item_id').val();
//    var itemId = $("#OrdemServicoItem_item_id").val();
//    if (tipoItemId !== "" && itemId !== "") {
//        if (itemId == 0) {
//            adicionarItemNaoCadastrado(tipoItemId);
//        } else {
//            adicionarItem(tipoItemId, itemId);
//        }
//    } else {
//        alert('Favor selecionar um item.');
//    }
//});

$('#select2_cliente_id').click(function () {
    if ($("#OrdemServico_cliente_carro_id").val() !== "") {
        $("#OrdemServico_cliente_carro_id").select2('data', null);
    }
    $("#resumo_nome_cliente").val($("#s2id_select2_cliente_id span").text());
    carregaSelect2Carros($(this).val())
});

//$('#select2_tipo_item_id').click(function () {
//    if ($("#OrdemServicoItem_item_id").val() !== "") {
//        $("#OrdemServicoItem_item_id").select2('data', null);
//    }
//    $('#add_item').addClass('oculta');
//    $('.itens_nao_cadastrados').addClass('oculta');
//    carregaItens($(this).val());
//});

$("#OrdemServico_cliente_carro_id").click(function () {
    $("#resumo_cliente_carro_placa").val($("#s2id_OrdemServico_cliente_carro_id span").text());
});

//$('#OrdemServicoItem_item_id').click(function () {
//    checarNaoCadastrado($(this).val());
//});