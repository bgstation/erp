var selecionarTodos = function (classe) {
    if ($('.pai_'+classe).is(':checked')) {
        $('.' + classe).each(function () {
            this.checked = true;
        });
    } else {
        $('.' + classe).each(function () {
            this.checked = false;
        });
    }
}