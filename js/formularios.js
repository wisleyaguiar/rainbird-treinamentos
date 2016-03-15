/**
 * Created by wisleyaguiar on 14/03/16.
 */
(function($) {

    // Cadastro de Usuários
    $("#caixa-cadastro").validate();
    $("#formCadastroCompleto").validate({
        lang: 'pt_BR',
        submitHandler: function(form) {
            $(form).ajaxSubmit();
        }
    });

})( jQuery );