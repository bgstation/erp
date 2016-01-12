var identificador = 1500;
var aProdutos = new Array;
var aServicos = new Array;
var aItensNaoCadastrados = [];

var acoesFinalizar = function () {
    $('#OrdemServicoItem_produtos').val(aProdutos);
    $('#OrdemServicoItem_servicos').val(aServicos);
    if (aItensNaoCadastrados.length > 0) {
        $('.itens_nao_cadastrados input').remove();
        $.each(aItensNaoCadastrados, function (key, obj) {
            $('.itens_nao_cadastrados').append('<input type="hidden" name="LogItemNaoCadastrado[' + obj.tipoItem + '][' + obj.identificador + '][titulo]" value="' + obj.titulo + '" />');
            $('.itens_nao_cadastrados').append('<input type="hidden" name="LogItemNaoCadastrado[' + obj.tipoItem + '][' + obj.identificador + '][preco]" value="' + obj.preco + '" />');
        });
    }
}

var atualizaValor = function (valor) {
    $("#valor_total span").text(number_format(valor, 2, ',', '.'));
    $("#valor_total").attr('total', valor);
}

var removerItem = function (tipoItem, itemId, identificador, preco) {
    if ((tipoItem == 1 || tipoItem == 2) && itemId != 0) {
        if (tipoItem == 1) {
            var index = aProdutos.indexOf(itemId);
            if (index != -1) {
                aProdutos.splice(index, 1);
            }
        } else if (tipoItem == 2) {
            var index = aServicos.indexOf(itemId);
            if (index != -1) {
                aServicos.splice(index, 1);
            }
        }
    } else {
        $.each(aItensNaoCadastrados, function (key, obj) {
            if (obj.identificador == identificador) {
                aItensNaoCadastrados.splice(key, 1);
            }
        });
    }
    $('tr[identificador=' + tipoItem + '_' + identificador + ']').remove();
    var novoValor = parseFloat($("#valor_total").attr('total')) - parseFloat(preco);
    atualizaValor(novoValor);
}

var getCodigoHtml = function (obj) {
    var html = '';
    html += '<tr identificador="' + obj.tipoItem + '_' + obj.identificador + '">';
    html += '<td>' + obj.titulo + '</td>';
    html += '<td> R$' + number_format(obj.preco, 2, ',', '.') + '</td>';
    html += '<td>';
    html += '<a href="javascript:void(0)" class="remove" onclick="removerItem(' + obj.tipoItem + ', ' + obj.itemId + ', ' + obj.identificador + ', ' + obj.preco + ')">';
    html += '<i class="fa fa-times"></i>';
    html += '</a>';
    html += '</td>';
    html += '</tr>';
    return html;
}

var adicionarItem = function (tipoItem, itemId, obj) {
    if (itemId !== "" && tipoItem !== "") {
        if (obj === undefined) {
            var objItem = $('#' + tipoItem + '_' + itemId);
            var obj = new Object();
            obj.titulo = objItem.attr('text');
            obj.preco = objItem.attr('preco');
            obj.identificador = identificador;
            obj.itemId = itemId;
            obj.tipoItem = tipoItem;
        }
        if (tipoItem == 1)
            aProdutos.push(parseInt(obj.itemId));
        if (tipoItem == 2)
            aServicos.push(parseInt(obj.itemId));
        $('#tipo_item_' + tipoItem + '_adicionados').append(getCodigoHtml(obj));
        var novoValor = parseFloat($("#valor_total").attr('total')) + parseFloat(obj.preco);
        atualizaValor(novoValor);
        identificador++;
    }
}

var adicionarItemNaoCadastrado = function (tipoItem) {
    var titulo = $('#LogItemNaoCadastrado_titulo').val();
    var preco = parseFloat($('#LogItemNaoCadastrado_preco').val().replace('.','').replace(',', '.'));
    var objTemp = new Object();
    objTemp.titulo = titulo;
    objTemp.preco = preco;
    objTemp.tipoItem = tipoItem;
    objTemp.identificador = identificador;
    objTemp.itemId = 0;
    aItensNaoCadastrados.push(objTemp);
    identificador++;
    adicionarItem(tipoItem, 0, objTemp);
}

var checarNaoCadastrado = function (itemId) {
    var tituloElem = $('#LogItemNaoCadastrado_titulo');
    var precoElem = $('#LogItemNaoCadastrado_preco');
    tituloElem.val(null);
    precoElem.val(null);
    if (itemId == 0) {
        tituloElem.css('display', '');
        precoElem.css('display', '');
    } else {
        tituloElem.css('display', 'none');
        precoElem.css('display', 'none');
    }
}

$('#btn_add_item').click(function () {
    var tipoItemId = $('#select2_tipo_item_id').val();
    var itemId = $("#OrdemServicoItem_item_id").val();
    if (tipoItemId !== "" && itemId !== "") {
        if (itemId == 0) {
            adicionarItemNaoCadastrado(tipoItemId);
        } else {
            adicionarItem(tipoItemId, itemId);
        }
    } else {
        alert('Favor selecionar um item.');
    }
});
function format(data) {
    if (!data.id) {
        return data.text;
    }
    var state = $('<span>' + data.text + '</span><span objId="' + data.id + '" text="' + data.text + '"  id="' + data.tipoItem + '_' + data.id + '" preco=' + data.preco + ' style="float: right">R$' + number_format(data.preco, 2, ',', '.') + '</span>');
    return state;
}

function format2(item) {
    if (!item.id) {
        return item.text;
    }
    var state = $('<span objId="' + item.id + '" text="' + item.text + '"  id="' + item.tipoItem + '_' + item.id + '" preco=' + item.preco + '>' + item.text + '</span>');
    return state;
}

$(document).ready(function () {
    if (clienteId !== "") {
        $("#OrdemServico_cliente_carro_id").parents('div').css('display', '');
        carregaSelect2Carros(clienteId);
        if (clienteCarroId !== "") {
            $("#OrdemServico_cliente_carro_id").val(clienteCarroId);
        }
    }
});
$('#select2_cliente_id').click(function () {
    if ($("#OrdemServico_cliente_carro_id").val() !== "") {
        $("#OrdemServico_cliente_carro_id").select2('data', null);
    }
    carregaSelect2Carros($(this).val());
});
$('#select2_tipo_item_id').click(function () {
    if ($("#OrdemServicoItem_item_id").val() !== "") {
        $("#OrdemServicoItem_item_id").select2('data', null);
    }
    $('#add_item').css('display', 'none');
    carregaItens($(this).val());
});

$('.preco').mask("#.##0,00", {reverse: true});