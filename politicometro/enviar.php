<?php
include("includes/cabecalho.php");
if (isset($_GET['enviado']))
	echo "formulario enviado!";
?>
<form action="enviar.php?enviado=1" method="post" enctype="multipart/form-data" id="enviar_proposta">
	<fieldset>
		<h3>Insira a proposta de um político:</h3>
		<div class="coluna">
			<label for="proponente" class="legenda">Nome do político:</label>
			<input type="text" class="campo" name="proponente" /> <br />
			
			<label for="descricao" class="legenda">Descrição da proposta:</label>		
			<input type="text" class="campo" name="descricao" /> <br />	
			
			<label for="fonte" class="legenda">Fonte:</label>
			<input type="text" class="campo" name="fonte" /> <br />
			
			<label for="area" class="legenda">Área de atuação:</label>
			<input type="text" class="campo" name="area" /> <br />
			
			<label for="status" class="legenda">Estágio de cumprimento:</label>
			<input type="text" class="campo" name="status" />
		</div>
		
		<br />
		
		<input type="submit" name="enviar" id="enviar_proposta_btn" value="enviar" />
	</fieldset>
</form>
<?php 
include("includes/rodape.php")
?>