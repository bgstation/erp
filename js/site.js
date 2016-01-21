$('.search_button').click(function () {
    if ($('.search_form').css('display') == 'none') {
        $('.search_button').text('Ocultar Filtros');
    } else {
        $('.search_button').text('Exibir Filtros');
    }
    $('.search_form').toggle('slow');
});

$('.reset-form').click(function(){
    $(this).parents('form').find("input[type=text], textarea").val("");
});