/**
 * Created by wisleyaguiar on 14/03/16.
 */
(function($) {

    // Cadastro de Usuários

    $('#cep').mask('00000-000');

    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('#cel').mask(SPMaskBehavior, spOptions);
    $('#telfixo').mask('(00) 0000-0000');
    $('#cpf').mask('000.000.000-00', {reverse: true});

    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "Este campo não pode conter espaços em branco.");

    $("#caixa-cadastro").validate({lang: 'pt_BR'});
    $("#formCadastroCompleto").validate({
        lang: 'pt_BR',
        rules: {
            nome_user: {
                noSpace: true
            }
        },
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