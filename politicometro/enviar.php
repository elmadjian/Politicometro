<?php
include("includes/cabecalho.php");
require("classes/Proposta.php");

if (isset($_GET['enviado'])) {
	//cria uma proposta nova no BD
	$pol = $_POST['proponente'];
	$dsc = $_POST['descricao'];
	$fnt = $_POST['fonte'];
	$cmp = $_POST['status'];
	$proposta = new Proposta($pol, $dsc, $fnt, $cmp);
	$proposta->insertPropostaBD();
	
	echo "<h2>formulario enviado!</h2>";
}
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
			<input type="text" class="campo" name="area" />
		</div>
		<div class="pure-control-group">	
			<label for="status" class="legenda">Estágio de cumprimento:</label>	
			<select class="campo" name="status" />
				<option>Não cumprida</option>
				<option>Cumprindo</option>
				<option>Cumprida</option>
			</select>
		</div>
		
		<input type="submit" name="enviar" id="enviar_proposta_btn" class="pure-button" value="enviar" />
		
	</fieldset>
</form>
<?php 
} //fecha campo de inserção de formulário
include("includes/rodape.php")
?>