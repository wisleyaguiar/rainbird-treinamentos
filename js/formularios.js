/**
 * Created by wisleyaguiar on 14/03/16.
 */
(function($) {

    // Cadastro de Usuários

    $('#cep').mask('00000-000');
    $('#cepFatura').mask('00000-000');

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
    $("#cnpjFatura").mask("99.999.999/9999-99");

    // Validando Espeços em Branco
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "Este campo não pode conter espaços em branco.");

    // Validando CPF
    $.validator.addMethod("cpf", function(value, element) {
        value = jQuery.trim(value);

        value = value.replace('.','');
        value = value.replace('.','');
        cpf = value.replace('-','');
        while(cpf.length < 11) cpf = "0"+ cpf;
        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;
        for (i=0; i<11; i++){
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
        }
        if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
        b = 0;
        c = 11;
        for (y=0; y<10; y++) b += (a[y] * c--);
        if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

        var retorno = true;
        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

        return this.optional(element) || retorno;

    }, "Informe um CPF válido");

    // Validando um CNPJ
    $.validator.addMethod("cnpj", function(cnpj, element) {

        var numeros, digitos, soma, resultado, pos, tamanho,
            digitos_iguais = true;

        if (cnpj.length < 14 && cnpj.length > 15)
            return false;

        for (var i = 0; i < cnpj.length - 1; i++)
            if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
                digitos_iguais = false;
                break;
            }

        if (!digitos_iguais) {
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0,tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }

            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

            if (resultado != digitos.charAt(0))
                return false;

            tamanho = tamanho + 1;
            numeros = cnpj.substring(0,tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }

            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

            if (resultado != digitos.charAt(1))
                return false;

            return true;
        }

        return false;
    }, "Informe um CNPJ v&aacute;lido.");

    // Validar CEP
    jQuery.validator.addMethod("cep", function(value, element) {
        return this.optional(element) || /^[0-9]{2}[0-9]{3}-[0-9]{3}$/.test(value);
    }, "Por favor, digite um CEP válido");

    // Cadastro de Usuários

    $("#caixa-cadastro").validate({lang: 'pt_BR'});
    $("#formCadastroCompleto").validate({
        lang: 'pt_BR',
        rules: {
            nome_user: {
                noSpace: true
            },
            cpf: {
                cpf: true
            },
            cep: {
                cep: true
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
                    $('.preloading').show();
                },
                data: dados,
                dataType: 'json',
                method:'POST',
                error: function(){
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                }
            }).done(function(resp){
                if(resp.erro) {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                } else {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Sucesso"
                    });
                    $('.preloading').hide();
                    window.location = '/treinamentos/cadastro-de-faturamento';
                }
            });
        }
    });

    // Login de usuário
    $("#caixa-login").validate({
        lang: 'pt_BR',
        submitHandler: function(form) {
            var dados = {
                'login': $('#login').val(),
                'senha': $('#senha').val(),
                'action': 'user_login'
            };
            $.ajax({
                url: ajax_object.ajax_url,
                beforeSend: function(){
                    $('.preloading').show();
                },
                data: dados,
                dataType: 'json',
                method:'POST',
                error: function(){
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                }
            }).done(function(resp){
                if(resp.erro) {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                } else {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Sucesso"
                    });
                    $('.preloading').hide();
                    window.location = '/treinamentos/cursos';
                }
            });
        }
    });
    
    // Cadastro Faturamento
    $("#formCadFatura").validate({
        lang: 'pt_BR',
        rules: {
            cepFatura: {
                cep: true
            }
        },
        submitHandler: function(form) {
            var dados = {
                'nomeNota': $('#nomeNota').val(),
                'enderecoFatura': $('#enderecoFatura').val(),
                'bairroFatura': $('#bairroFatura').val(),
                'cidadeFatura': $('#cidadeFatura').val(),
                'estadoFatura': $('#estadoFatura').val(),
                'cepFatura': $('#cepFatura').val(),
                'cnpjFatura': $('#cnpjFatura').val(),
                'ieFatura': $('#ieFatura').val(),
                'user_id': $('#user_id').val(),
                'action': 'cad_fatura_user'
            };
            $.ajax({
                url: ajax_object.ajax_url,
                beforeSend: function(){
                    $('.preloading').show();
                },
                data: dados,
                dataType: 'json',
                method:'POST',
                error: function(){
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                }
            }).done(function(resp){
                if(resp.erro) {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                } else {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Sucesso"
                    });
                    $('.preloading').hide();
                    window.location = '/treinamentos/sucesso';
                }
            });
        }
    });

    // Formulário de compra de inscrição
    $('#formEscolhaModulos input[type=checkbox]').click(function(){
        var checkbox = $(this);
        if(checkbox.is(':checked')) {
            $('input[name=' + checkbox.attr('id') + '-hosp]').attr("disabled",false);
        } else {
            $('input[name=' + checkbox.attr('id') + '-hosp]').attr("disabled",true).attr("checked",false);
        }
    });
    
    // Submissão formulário de inscrição
    $('#formEscolhaModulos').submit(function(e){
        e.preventDefault();

        if(!$('input[type=checkbox]').is(':checked')) {
            $( "#dialog-message").html("Você deve marcar ao menos um módulo.");
            $( "#dialog-message" ).dialog({
                modal: true,
                title: "Aviso",
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
            return false;
        }
        else if(!$('input[type=radio]').is(':checked')) {
            $( "#dialog-message").html("Você deve marcar ao menos um valor de inscrição.");
            $( "#dialog-message" ).dialog({
                modal: true,
                title: "Aviso",
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
            return false;
        }
        else {
            $.ajax({
                url: ajax_object.ajax_url,
                beforeSend: function(){
                    $('.preloading').show();
                },
                data: $(this).serialize(),
                dataType: 'json',
                method:'POST',
                error: function(){
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                }
            }).done(function(resp){
                if(resp.erro) {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Aviso",
                        buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                    $('.preloading').hide();
                } else {
                    $( "#dialog-message").html(resp.msg);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        title: "Sucesso"
                    });
                    $('.preloading').hide();
                    window.location = '/treinamentos/pagamento/';
                }
            });
        }
    });

})( jQuery );