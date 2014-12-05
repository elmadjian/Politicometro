<?php
/*====================================================================
 * 
 * CLASSE: TestDeUnidadeProposta
 * DESCRIÇÃO: executa os testes de unidade para a classe Proposta
 * 
 =====================================================================*/
 
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/../classes/Proposta.php');

class TestDeUnidadeProposta extends UnitTestCase {
    private $proposta;    
    
    function __construct() {
        parent::__construct('Testes de Unidade : classe Proposta');
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        $this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->dao = new dao();
    }
    //===============  VIDA  ====================
    //garantir: arear= char(90); politico= int(11), registro do politico;
    //          informante = char (90); descricao= tinytext; fonte=tinytext.
    function testVerdadeAbsoluta() {
        $this->assertTrue(true);
        echo 'testVerdadeAbsoluta executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testCriacaoDeObjeto() {     
        $this->assertNotNull($this->proposta);
        echo 'testCriacaoDeObjeto executado<br>';
        echo '------------------------------------------------<br>';
    }
    //=============== GETTERS ====================
    function testGetAreaAtuacao() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertEqual($this->proposta->getAreaAtuacao(), 0);
        echo 'testGetAreaAtuacao executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetStatusCumprimento() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertIdentical($this->proposta->getStatusCumprimento(), "naoClassificada");
        echo 'testGetStatusCumprimento executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetProcedencia() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertIdentical($this->proposta->getProcedencia(), 0);
        echo 'testGetProcedencia executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetProponente() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertEqual($this->proposta->getProponente(), 15);
        echo 'testGetProponente executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetInformante() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertIdentical($this->proposta->getInformante(), "informante");
        echo 'testGetInformante executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetRelevancia() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertIdentical($this->proposta->getRelevancia(), "naoClassificada");
        echo 'testGetRelevancia executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetDescricao() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertIdentical($this->proposta->getDescricao(), "descricaoTestProposta de texto longo");
        echo 'testGetDescricao executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetFonte() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertIdentical($this->proposta->getFonte(), "fonte de texto longo");
        echo 'testGetFonte executado<br>';
        echo '------------------------------------------------<br>';
    }
	//============= ACESSO AO BD =================
	function testInsertPropostaBD() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $this->assertTrue($this->proposta->insertPropostaBD());
        echo 'testInsertPropostaBD executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetPropostaBD() {
        // proposta = new proposta(AREA, POLITICO, INFORMANTE, DESCRICAO, FONTE );
        //$this->proposta = new proposta('Cultura', 15, "informante", "descricaoTestProposta de texto longo", "fonte de texto longo" );
        $retorno = $this->dao->getDataFromColumn('id','proposta', 'descricao', "descricaoTestProposta de texto longo");
        $propostaId = array_pop($retorno[0]);
        $this->assertTrue($this->proposta->getPropostaBD($propostaId));
        echo 'testGetPropostaBD executado<br>';
        echo '------------------------------------------------<br>';
        //limpando o BD
        $this->dao->remove($propostaId, "proposta");
    }
    /*
	
	//3 - verifica se uma proposta salva no BD tem campos
	//    idênticos aos atributos da proposta atual
	//----------------------------------------------------------
	private function propostaIgualBD() {
		
	}
	*/
    
    
}
?>
