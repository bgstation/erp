$('.monetario').mask("#.##0,00", {reverse: true});

var finalizar = function () {
    $('input').removeAttr('disabled');
}

$("#select2_forma_pagamento_id_1").val(1);

var resetarValor = function (tudo) {
    if (tudo) {
        $("#select2_forma_pagamento_id_1").val(1);
        $("#OrdemServicoTipoPagamento_1_valor").val(number_format(valorTotalOri - desconto, 2, ',', '.'));
        $("#select2_forma_pagamento_id_2").select2('val', '');
    }
    $("#valorTotal").text('Total: R$ ' + number_format(valorTotalOri - desconto, 2, ',', '.'));
    $("#OrdemServicoTipoPagamento_2_valor").val(null);
    $("#OrdemServicoTipoPagamento_2_valor").attr('disabled', 'disabled');
    $('#OrdemServicoTipoPagamento_2_parcelas').addClass('oculta');
    $('#OrdemServicoTipoPagamento_2_parcelas').val(null);
}

var addFormaPagamento = function (indentificador, id) {
    if (id !== "" && indentificador == 2) {
        $('#OrdemServicoTipoPagamento_' + indentificador + '_valor').removeAttr('disabled');
    }
    if (id == 3) {
        $('#OrdemServicoTipoPagamento_' + indentificador + '_parcelas').removeClass('oculta');
    } else {
        $('#OrdemServicoTipoPagamento_' + indentificador + '_parcelas').addClass('oculta');
        $('#OrdemServicoTipoPagamento_' + indentificador + '_parcelas').val(null);
    }
}

$("#select2_forma_pagamento_id_2").change(function () {
    if ($(this).val() === "") {
        resetarValor(false);
    }
})

$(".preco").focus(function () {

}).blur(function () {
    var valorTmp = parseFloat($(this).val().replace('.', '').replace(',', '.'));
    if ($(this).val() !== "") {
        if (valorTmp > valorTotal) {
            alert('Valor inválido!');
            $(this).val(null);
            return false;
        } else {
            $("#OrdemServicoTipoPagamento_1_valor").val(number_format(valorTotal - valorTmp, 2, ',', '.'));
        }
    }
});

$('#OrdemServico_desconto').blur(function () {
    var valorTmp = parseFloat($(this).val().replace('.', '').replace(',', '.'));
    if (valorTmp !== desconto) {
        if ($(this).val() !== "") {
            desconto = parseFloat($(this).val().replace('.', '').replace(',', '.'));
            if (valorTmp > valorTotalOri) {
                alert('Valor inválido!');
                $(this).val(null);
                return false;
            } else {
                valorTotal = valorTotalOri - valorTmp;
                resetarValor(true);
            }
        } else {
            desconto = 0;
            resetarValor(true);
        }
    }
});