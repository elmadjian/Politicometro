<?php 
include(dirname(__FILE__)."/includes/cabecalho.php");
require_once(dirname(__FILE__)."/classes/Usuario.php");
require_once(dirname(__FILE__)."/classes/Proposta.php");

?> 
<h2>Verificação de propostas</h2>
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
		
		if ($i %2 == 0)
			echo "<tr class=\"table-odd\">";
		else
			echo "<tr>";
		
		echo "<td>".++$i."</td>".
		     "<td>".$proposta->getDescricao()."</td>".
		     "<td>".$proposta->getProponente()."</td>".
		     "<td>".$proposta->getInformante()."</td>".
			 "<td>".$proposta->getStatusCumprimento()."</td>".
			 "<td>".$proposta->getAreaAtuacao()."</td>".
			 "<td>".$proposta->getFonte()."</td>".
		     "<td> <button type=\"submit\" class=\"pure-button pure-button-primary\">OK!</button></td>";
		
		
	}
	

		/*<td>1</td>
		<td>Honda</td>
		<td>Accord</td>
		<td>2009</td>
		</tr>
		
		<tr>
		<td>2</td>
		<td>Toyota</td>
		<td>Camry</td>
		<td>2012</td>
		</tr>
		
		<tr class="pure-table-odd">
		<td>3</td>
		<td>Hyundai</td>
		<td>Elantra</td>
		<td>2010</td>
		</tr>
		
		<tr>
		<td>4</td>
		<td>Ford</td>
		<td>Focus</td>
		<td>2008</td>
		</tr>
		
		<tr class="pure-table-odd">
		<td>5</td>
		<td>Nissan</td>
		<td>Sentra</td>
		<td>2011</td>
		</tr>
		
		<tr>
		<td>6</td>
		<td>BMW</td>
		<td>M3</td>
		<td>2009</td>
		</tr>
		
		<tr class="pure-table-odd">
		<td>7</td>
		<td>Honda</td>
		<td>Civic</td>
		<td>2010</td>
		</tr>
		
		<tr>
		<td>8</td>
		<td>Kia</td>
		<td>Soul</td>
		<td>2010</td>
		</tr>*/

?>
        
    </tbody>
</table>


<?php 
include("includes/rodape.php");
?>