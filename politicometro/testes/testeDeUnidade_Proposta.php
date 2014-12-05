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
        $this->proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
    }
    //===============  VIDA  ====================
    function testVerdadeAbsoluta() {
        $this->assertTrue(true);
        echo 'testVerdadeAbsoluta executado<br>';
    }
    function testCriacaoDeObjeto() {     
        $this->assertNotNull($this->proposta);
        echo 'testCriacaoDeObjeto executado<br>';
    }
    //=============== GETTERS ====================
    function testGetAreaAtuacao() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertEqual($this->proposta->getAreaAtuacao(), 0);
        echo 'testGetAreaAtuacao executado<br>';
    }
    function testGetStatusCumprimento() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getStatusCumprimento(), "naoClassificada");
        echo 'testGetStatusCumprimento executado<br>';
    }
    function testGetProcedencia() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getProcedencia(), 0);
        echo 'testGetProcedencia executado<br>';
    }
    function testGetProponente() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getProponente(), "politico");
        echo 'testGetProponente executado<br>';
    }
    function testGetInformante() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getInformante(), "informante");
        echo 'testGetInformante executado<br>';
    }
    function testGetRelevancia() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getRelevancia(), "naoClassificada");
        echo 'testGetRelevancia executado<br>';
    }
    function testGetDescricao() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getDescricao(), "descricao");
        echo 'testGetDescricao executado<br>';
    }
    function testGetFonte() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getFonte(), "fonte");
        echo 'testGetFonte executado<br>';
    }

/*
	
	//============= ACESSO AO BD =================
	//1 - salva a proposta no BD
	//----------------------------------------------------------
	public function insertPropostaBD() {
		
		$propostas = array(
			'area'          => $this->areaAtuacao,
			'status'        => $this->statusCumprimento,
			'procedencia'   => $this->procedencia,
			'classificacao' => $this->classificacao,
			'proponente'    => $this->proponente,
			'informante'    => $this->informante,
			'relevancia'    => $this->relevancia,
			'descricao'     => $this->descricao,
			'fonte'         => $this->fonte
 		);
		if (!$this->dao->insert($propostas, 'proposta'))
			echo "ERRO: não foi possível inserir proposta no BD!";
	}
	
	//2 - recupera proposta salva no BD
	//----------------------------------------------------------
	private function getPropostaBD() {
		
		
	}
	
	//3 - verifica se uma proposta salva no BD tem campos
	//    idênticos aos atributos da proposta atual
	//----------------------------------------------------------
	private function propostaIgualBD() {
		
	}

*/


}
?>