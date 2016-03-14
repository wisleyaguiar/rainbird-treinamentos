/**
 * Created by wisleyaguiar on 14/03/16.
 */
(function($) {

    // Cadastro de Usuários
    $("#formCadastroCompleto").validate({
        submitHandler: function(form) {
            $(form).ajaxSubmit();
        }
    });

})( jQuery );