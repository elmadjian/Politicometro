<?php 
include(dirname(__FILE__)."/includes/cabecalho.php");
require(dirname(__FILE__)."/classes/Usuario.php");
require(dirname(__FILE__)."/classes/Verificador.php");
require(dirname(__FILE__)."/classes/Classificador.php");
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
if (isset($_GET['enviar']))
	$_SESSION['enviar'] = true;

if (isset($_POST['autenticar'])) {
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	//acessa dados do usuário no BD e tenta logar no sistema
	$usuario = new Usuario($login);
	if ($usuario->autenticar($senha)) {	
			
		switch($usuario->getTipo()) {		
			case 'administrador' : 
				break; //TODO: cria administrador
			case 'verificador'   :
				$verificador = new Verificador($login);
				$_SESSION['userID'] = serialize($verificador);
				break;
			case 'classificador':
				$classificador = new Classificador($login);
				$_SESSION['userID'] = serialize($classificador);
				break;
			default:
				$_SESSION['userID'] = serialize($usuario);
				break;			
		}
		
		//retorna para página de inserção de proposta
		if ($_SESSION['enviar']) {
			$_SESSION['enviar'] = false;
			header("Location:enviar.php");
		}
		
		//vai para página inicial
		else		
			header("Location:index.php?logado=1");
	}
	else
		echo "<br /><h3>Senha inválida!</h3>";
	
	
}


include("includes/rodape.php")
?>