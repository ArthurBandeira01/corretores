//Script para mudar os formulários
function mudaLogCPF(){
    $('#mudaCPF').css('display', 'block');
    $('#mudaIE').css('display', 'none');
}
function mudaLogIE(){
     $('#mudaIE').css('display', 'block');
     $('#mudaCPF').css('display', 'none');
}  
//fim muda form

//Sweet Alert:
$(document).ready(function(){
    Swal.fire({
      title: 'Usuário não está logado',
      html: '<a href="login.php">Logar para solicitar pontuação</a>',
      icon: 'warning'
    });
});
//fim sweet