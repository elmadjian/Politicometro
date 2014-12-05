<?php
require(dirname(__FILE__)."/classes/Usuario.php");
require(dirname(__FILE__)."/classes/Verificador.php");
require(dirname(__FILE__)."/classes/Classificador.php");
include(dirname(__FILE__)."/includes/cabecalho.php");
require(dirname(__FILE__)."/classes/Proposta.php");

//Irá inserir uma proposta política nova no DB
//===============================
if (isset($_GET['enviado']) && isset($_SESSION['userID'])) {
	$are = $_POST['area'];
	$pol = $_POST['proponente'];
	$dsc = $_POST['descricao'];
	$fnt = $_POST['fonte'];
	$usr = unserialize($_SESSION['userID']);
	$proposta = new Proposta($are, 2312311, $usr->getLogin(), $dsc, $fnt);
	$proposta->insertPropostaBD();
	
	echo "<h2>formulario enviado!</h2>";
}

//Usuário precisa ser registrado para inserir proposta
//================================
else if (!isset($_SESSION['userID']))
	header("Location:login.php?enviar=1");


//Formulário para envio. O usuário não preenche todos
//os atributos da proposta. Parte dessa tarefa são de outros agentes
//do sistema
//================================
else {
?>
<form class="pure-form pure-form-aligned" action="enviar.php?enviado=1" 
method="post" enctype="multipart/form-data" id="enviar_proposta">
	<fieldset>
		<h2>Insira a proposta de um político:</h2>
		<div class="pure-control-group">	
			<label for="proponente" class="legenda">Nome do político:</label>
			<select class="campo" name="proponente" />
				<?php
					//LOOP para pegar uma lista de políticos e disponibilizar AQUI
					echo "<option>Fulano da Silva Filho</option>"; 
				?>
			</select>
		</div>
		<div class="pure-control-group">		
			<label for="descricao" class="legenda">Descrição da proposta:</label>	
			<textarea rows="4" cols="19" class="campo" name="descricao"></textarea> 
		</div>
		<div class="pure-control-group">	
			<label for="fonte" class="legenda">Fonte:</label>
			<input type="text" class="campo" name="fonte" /> 
		</div>
		<div class="pure-control-group">	
			<label for="area" class="legenda">Área de atuação:</label>
			<select class="campo" name="area" />
				<option>Saúde</option>
				<option>Educação</option>
				<option>Esportes</option>
				<option>Cultura</option>
				<option>Transportes</option>
				<option>Energia</option>
				<option>Infraestrutura</option>
				<option>Outra</option>
			</select>
		</div>
		
		<input type="submit" name="enviar" id="enviar_proposta_btn" class="pure-button pure-button-primary" value="enviar" />
		
	</fieldset>
</form>
<?php 
} //fecha campo de inserção de formulário
include("includes/rodape.php")
?>
