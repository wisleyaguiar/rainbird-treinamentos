<div class="sidebar-usuario">
    <p>Seja bem vindo, <br><strong><?php echo $user_dados->first_name; ?></strong></p>
    <ul class="op-user">
        <li><a href="<?php echo home_url('/minha-conta'); ?>">Minha Conta</a></li>
        <li><a href="<?php echo home_url('/?logoff=true'); ?>">Sair</a></li>
    </ul>
    
    <ul class="lista-eventos" style="margin-top: 30px;">
        <li>
            <a href="#" class="box-capa"><img src="images/treinamentos/capa-treinamento.jpg" alt="Treinamentos"></a>
            <h2 class="tituloEvento">Academia Rain Bird<br>Salvador/BA<br>29/fev a 04/mar</h2>
        </li>
    </ul>
    
</div>