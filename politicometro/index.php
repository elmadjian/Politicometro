<?php 
require(dirname(__FILE__)."/classes/Usuario.php");
require(dirname(__FILE__)."/classes/Verificador.php");
require(dirname(__FILE__)."/classes/Classificador.php");
include(dirname(__FILE__)."/includes/cabecalho.php");

if (isset($_GET['logado']) && isset($_SESSION['userID'])) {
	$usuario = unserialize($_SESSION['userID']);
	echo "<h2>Bem-vindo, {$usuario->getLogin()}!</h2>";
}

if (isset($_GET['logout'])) {
	$_SESSION = array();
	if (isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-90000, '/');
	session_destroy();
	header("Location:index.php");
}


?> 

<p>RANKING!</p>

<?php 
include("includes/rodape.php");
?>