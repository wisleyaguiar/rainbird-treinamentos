/**
 * Created by wisleyaguiar on 14/03/16.
 */
(function($) {

    // Cadastro de Usuários
    $("#caixa-cadastro").validate({lang: 'pt_BR'});
    $("#formCadastroCompleto").validate({
        lang: 'pt_BR',
        submitHandler: function(form) {
            $(form).ajaxSubmit();
        }
    });

    // Login de usuário
    $("#caixa-login").validate({lang: 'pt_BR'});

})( jQuery );