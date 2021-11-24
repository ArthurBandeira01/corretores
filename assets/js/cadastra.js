//Script para mudar os formulários
function mudaCPF(){
    $('#mudac').css('display', 'block');
    $('#mudacp').css('display', 'none');
}
function mudaIE(){
     $('#mudacp').css('display', 'block');
     $('#mudac').css('display', 'none');
}  
//fim muda form

//Mensagem sucesso ao cadastrar:
$(function(){
  if($('#btnCadastrado').length)
    $( "#btnCadastrado").fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
});
//fim sucesso

//Mensagem erro ao cadastrar:
$(function(){
  if($('#invalido').length)
    $( "#invalido").fadeIn( 300 ).delay( 1500 ).fadeOut( 1500 );
});
//fim erro

//Script para máscara no cadastro
$(document).ready(function(){
    //Campos CPF:
    $("#cpf").inputmask({"mask": "999.999.999-99"});
    $("#celularCPF").inputmask({"mask": "(99) 9 9999-9999"});
    $("#telefoneCPF").inputmask({"mask": "(99) 9999-9999"});

    //Campos IE:
    $("#celularIE").inputmask({"mask": "(99) 9 9999-9999"});
    $("#telefoneIE").inputmask({"mask": "(99) 9999-9999"});
  });
//Fim script máscara