<?php 
require_once(dirname(__FILE__)."/classes/Usuario.php");
require_once(dirname(__FILE__)."/classes/Verificador.php");
require_once(dirname(__FILE__)."/classes/Proposta.php");
include(dirname(__FILE__)."/includes/cabecalho.php");


?> 
<h2>Verificação de propostas</h2>
<form class="nostyle" action="verificar.php" method="post">
	<table class="pure-table">
	    <thead>
	        <tr>
	            <th>#</th>
	            <th class="large">Descrição da proposta</th>
	            <th>Político</th>
	            <th>Submetida por</th>
	            <th>Status</th>
	            <th>Área de atuação</th>
	            <th>Fonte</th>
	            <th>Verificar</th>
	        </tr>
	    </thead>
	
	    <tbody>
<?php 

	//Mostra as propostas verificáveis
	//===================================
	$OK_ID = 0;
	if (isset($_POST['OK_ID']))
		$OK_ID = $_POST['OK_ID'];

	$dao = new Dao();
	$data = $dao->getDataFromColumn('id', 'proposta', 'procedencia', 0);
	$propostas = array();
	foreach ($data as $proposta) {
		$propostaAtual = new Proposta();
		$propostaAtual->getPropostaBD(array_pop($proposta));
		array_push($propostas, $propostaAtual); 	
	}
	
	$i = 0;
	foreach ($propostas as $proposta) {	

		if ($proposta->getID() == $OK_ID) {
			$proposta->setProcedencia(1);
			continue;
		}
		$politico_res = $dao->getDataFromColumn('nome', 'politico', 'registro', 
			$proposta->getProponente());
		$politico = array_pop($politico_res)['nome'];

		if ($i %2 == 0)
			echo "<tr class=\"table-odd\">";
		else
			echo "<tr>";	
		echo "<td>".++$i."</td>".
		     "<td>".$proposta->getDescricao()."</td>".
		     "<td>".$politico."</td>".
		     "<td>".$proposta->getInformante()."</td>".
			 "<td>".$proposta->getStatusCumprimento()."</td>".
			 "<td>".$proposta->getAreaAtuacao()."</td>".
			 "<td>".$proposta->getFonte()."</td>".
		     "<td> <button type=\"submit\" name=\"OK_ID\" value=\"{$proposta->getID()}\" ". 
		     "class=\"pure-button pure-button-primary\">OK!</button></td>";
	}
	
?>
        
	    </tbody>
	</table>
</form>

<?php 
include("includes/rodape.php");
?>