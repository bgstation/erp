var removerCarro = function (url) {
    if (confirm('Esta operação é irreversível, deseja continuar ?')) {
        window.location.href = url;
    } else {
        alert('Operação cancelada!');
    }
    
}