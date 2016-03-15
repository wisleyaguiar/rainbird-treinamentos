/**
 * Created by wisleyaguiar on 14/03/16.
 */
(function($) {

    // Cadastro de Usuários
    $("#caixa-cadastro").validate({lang: 'pt_BR'});
    $("#formCadastroCompleto").validate({
        lang: 'pt_BR',
        submitHandler: function(form) {
            if($('#sexo_1').is(":checked")) {
                var sexo = 'M';
            } else if($('#sexo_2').is(":checked")) {
                var sexo = 'F';
            } else {
                var sexo = '';
            }
            var dados = {
                'nomeCompleto': $('#nomeCompleto').val(),
                'endereco': $('#endereco').val(),
                'bairro': $('#bairro').val(),
                'cidade': $('#cidade').val(),
                'estado': $('#estado').val(),
                'cep': $('#cep').val(),
                'email': $('#email').val(),
                'telfixo': $('#telfixo').val(),
                'cel': $('#cel').val(),
                'sexo': sexo,
                'cpf': $('#cpf').val(),
                'rg': $('#rg').val(),
                'nome_user': $('#nome_user').val(),
                'senha_user': $('#senha_user').val(),
                'action': 'cad_new_user'
            };
            $.ajax({
                url: ajax_object.ajax_url,
                beforeSend: function(){
                    $('#preloading').show();
                },
                data: dados,
                dataType: 'json',
                method:'POST'
            }).done(function(resp){

            });
        }
    });

    // Login de usuário
    $("#caixa-login").validate({lang: 'pt_BR'});

})( jQuery );