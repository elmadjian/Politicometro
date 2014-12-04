<?php
	ob_start();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
	<link rel="stylesheet" href="lib/pure-min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="lib/style.css" type="text/css" media="screen" />
	<!-- <script type="text/javascript" src="lib/jquery-1.9.1.min.js"></script>-->
	<title>Politicômetro </title>
</head>
	
<body>
	<!-- imagem de fundo -->
	<div id="img_fundo"></div>
	<!-- inicio do cabecalho -->
	<div id="cabecalho">
		<div id="titulo">
			<h1><a href="index.php" class = "title_text">Politicômetro </a></h1>
			<h5 class="subtitulo_text">O portal que mostra o desempenho dos políticos</h5>
		</div>
		
		<!--  seletor de menu -->
		<div id="navegacao">
			<div id ="login" />
				<p><a href="login.php">login</a> | <a href="cadastrar.php">cadastre-se</a></p>
			</div>
			<!-- Menu superior de opcoes -->
			<ul id="menu">
				<li id="menu_1"><a href="">rankings</a></li>
				<li id="menu_2"><a href="enviar.php">enviar proposta</a></li>
				<li id="menu_3"><a href="">em votação</a></li>
				<li id="menu_4"><a href="">políticos</a></li>
				<li id="menu_5"><a href="">propostas</a></li>
			</ul>
		</div>
	
	</div> <!-- fim do cabecalho -->
	<div id="content" class="inicio">
	