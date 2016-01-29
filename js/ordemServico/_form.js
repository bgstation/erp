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

var habilitaCamposTextos = function (obj, checked) {
    if (checked && obj.preco_variavel == 1) {
        $(".item_" + obj.tipoItem + "_" + obj.itemId).removeAttr('disabled');
    } else {
        $(".item_" + obj.tipoItem + "_" + obj.itemId).attr('disabled', 'disabled');
    }
}

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

$(".selecionaItem").click(function () {
    selecionaItens($(this));
});

$('#select2_cliente_id').click(function () {
    if ($("#OrdemServico_cliente_carro_id").val() !== "") {
        $("#OrdemServico_cliente_carro_id").select2('data', null);
    }
    $("#resumo_nome_cliente").val($("#s2id_select2_cliente_id span").text());
    carregaSelect2Carros($(this).val())
});


$("#OrdemServico_cliente_carro_id").click(function () {
    $("#resumo_cliente_carro_placa").val($("#s2id_OrdemServico_cliente_carro_id span").text());
});
