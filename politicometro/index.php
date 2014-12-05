<?php 
require("classes/Usuario.php");
include("includes/cabecalho.php");

if (isset($_GET['logado']) && isset($_SESSION['userID'])) {
	$usuario = $_SESSION['userID'];
	echo "Bem-vindo, " + $usuario->getLogin();
}


?> 

<p>RANKING!</p>

<?php 
include("includes/rodape.php");
?>