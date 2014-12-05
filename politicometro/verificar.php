<?php 
include(dirname(__FILE__)."/includes/cabecalho.php");
require_once(dirname(__FILE__)."/classes/Usuario.php");

?> 
<h2>Verificação de propostas</h2>
<table class="pure-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Descrição da proposta</th>
            <th>Político</th>
            <th>Submetida por</th>
            <th>Status</th>
            <th>Área de atuação</th>
            <th>Fonte</th>
        </tr>
    </thead>

    <tbody>
<?php 

	
		<tr class="pure-table-odd">
		<td>1</td>
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
		</tr>

?>
        
    </tbody>
</table>


<?php 
include("includes/rodape.php");
?>