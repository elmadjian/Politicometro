<?php 
require_once(dirname(__FILE__)."/classes/Usuario.php");
require_once(dirname(__FILE__)."/classes/Classificador.php");
require_once(dirname(__FILE__)."/classes/Proposta.php");
include(dirname(__FILE__)."/includes/cabecalho.php");


?> 
<h2>Classificação de propostas</h2>
<form class="nostyle" action="classificar.php" method="post">
	<table class="pure-table">
	    <thead>
	        <tr>
	            <th>#</th>
	            <th class="large">Descrição da proposta</th>
	            <th>Político</th>
	            <th>Submetida por</th>
	            <th>Status</th>
	            <th>Área de atuação</th>
	            <th>Relevância</th>
	            <th>Classificação</th>
	            <th>Confirma?</th>
	        </tr>
	    </thead>
	
	    <tbody>
<?php 

	//Mostra as propostas classificáveis
	//===================================
	$OK_ID = 0;
	if (isset($_POST['OK_ID']))
		$OK_ID = $_POST['OK_ID'];

	$dao = new Dao();
	$data = $dao->getDataFromColumn('id', 'proposta', 'classificacao', 'naoClassificada');
	$propostas = array();
	foreach ($data as $proposta) {
		$propostaAtual = new Proposta();
		$propostaAtual->getPropostaBD(array_pop($proposta));
		array_push($propostas, $propostaAtual); 	
	}
	
	$i = 0;
	foreach ($propostas as $proposta) {	

		if ($proposta->getID() == $OK_ID) {
			$proposta->setClassificacao($_POST['classificacao']);
			$proposta->setRelevancia($_POST['relevancia']);
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
			 "<td><select class=\"campo\" name=\"relevancia\"/>
				<option>baixa</option>
				<option>media</option>
				<option>alta</option>
			 </select></td>".
			 "<td><select class=\"campo\" name=\"classificacao\"/>
				<option>subjetiva</option>
				<option>objetiva</option>
			 </select></td>".
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