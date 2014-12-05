<?php 
include("includes/cabecalho.php");
require("classes/Usuario.php");
?> 

<form class="pure-form pure-form-stacked" method="post" enctype="multipart/form-data" action="login.php">
    <fieldset>
        <h2>Faça seu login</h2>

        <label for="login">login</label>
        <input type="text" placeholder="insira seu login" name="login">

        <label for="senha">senha</label>
        <input type="password" placeholder="insira sua senha" name="senha"> <br />
        
        <button type="submit" name="autenticar" class="pure-button pure-button-primary">Entrar!</button>
    </fieldset>
</form>


<?php 
//LOGIN
//================================
if (isset($_POST['autenticar'])) {
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	//acessa dados do usuário no BD e tenta logar no sistema
	$usuario = new Usuario($login);
	if ($usuario->autenticar($senha)) {
		$_SESSION['userID'] = $usuario;
		header("Location:index.php?logado=1");
	}
	else
		echo "<br /><h3>Senha inválida!</h3>";
	
	
}


include("includes/rodape.php")
?>