<?php
/*====================================================================
 * 
 * CLASSE: TestDeUnidadePolitico
 * DESCRIÇÃO: executa os testes de unidade para a classe Politico
 * 
 =====================================================================*/

require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/../classes/Politico.php');

class TestDeUnidadePolitico extends UnitTestCase {
    function __construct() {
        parent::__construct('Testes de Unidade : classe Politico');
    }

    function testVerdadeAbsoluta() {
	echo 'testVerdadeAbsoluta executado<br>';
        $this->assertTrue(true);
    }
    function testCriacaoDeObjeto() {
       // $politco = new politico();
        $this->assertTrue(true);
    }

/*function __construct() {
		$this->dao = new Dao();
	}
	
	//=============== GETTERS ====================
	//devolve o cargo que o político ocupa atualmente
	public function getCargo() {
		return $this->cargo;
	}
	
	//devolve o nome do político
	public function getNome() {
		return $this->nome;
	}
	
	//devolve o partido político ao qual pertence
	public function getPartido() {
		return $this->partido;
	}
	
	//devolve o número de registro no TSE
	public function getRegistro() {
		return $this->registro;
	}
	
	//retorna uma lista de propostas deste político
	public function getPropostas() {
		return $this->propostas;
	}
	
	//=============== ACESSO AO BD =================
	//1 - pega todas as propostas de um político e coloca numa lista
	//--------------------------------------------------------------
	private function getPropostasBD() {
*/



}
?>
