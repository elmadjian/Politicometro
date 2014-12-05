<?php 
include(dirname(__FILE__)."/includes/cabecalho.php");
require(dirname(__FILE__)."/classes/Usuario.php");

if (isset($_GET['enviado'])) {
	//cria um usuário novo no BD
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$nome  = $_POST['nome_completo'];
	$email = $_POST['email'];

	$usuario = new Usuario($nome, $email, $login);
	$usuario->insertUserBD($senha);

	echo "<h2>Usuário cadastrado com sucesso!</h2>";
}
else {
?> 

<form class="pure-form pure-form-aligned" method="post" enctype="multipart/form-data" 
action="cadastrar.php?enviado=1">
    <fieldset>
    	<h2>Faça seu cadastro</h2>
    
        <div class="pure-control-group">
            <label for="login">login</label>
            <input type="text" placeholder="Escolha um nome de usuário" name="login">
        </div>

        <div class="pure-control-group">
            <label for="senha">senha</label>
            <input type="password" placeholder="Escolha uma senha" name="senha">
        </div>
        
        <div class="pure-control-group">
            <label for="nome_completo">nome completo</label>
            <input type="text" placeholder="Digite seu nome" name="nome_completo">
        </div>

        <div class="pure-control-group">
            <label for="email">e-mail</label>
            <input type="email" placeholder="Endereço de e-mail" name="email">
        </div>

        <div class="pure-controls">
            <label for="cbox" class="pure-checkbox">
                <input type="checkbox"> Eu li e concordo com os termos e condições do Politicômetro
            </label>

            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
</form>


<?php 
} //fecha campo de inserção de formulário
include("includes/rodape.php")
?>