<?php
/*====================================================================
 * 
 * CLASSE: TestDeUnidadeUsuario
 * DESCRIÇÃO: executa os testes de unidade para a classe Usuario
 * 
 =====================================================================*/
 
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/../classes/Politico.php');
require_once(dirname(__FILE__) .'/../DAL/Dao.php');

class TestDeUnidadeUsuario extends UnitTestCase {
    private $politico;    
    
    function __construct() {
        parent::__construct('Testes de Unidade : classe Usuario');
        $this->politico;
        $this->dao = new dao();
        
        $this->dado = array(
			'nome'  => 'classe:TestDeUnidadeDao , rotina testInsertPolitico',
			'cargo' => 'politicoTeste(TestDeUnidadeDao)',
			'partido' => 'partidoT',
			'registro' => 696969,
		); 
        $this->dao->insert($this->dado, 'politico');
        $this->politico = new politico(696969);
    }
    //===============  VIDA  ====================
    function testVerdadeAbsoluta() {
        $this->assertTrue(true);
        echo 'testVerdadeAbsoluta executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testCriacaoDeObjeto() {
        $this->assertNotNull($this->politico);
        echo 'testCriacaoDeObjeto executado<br>';
        echo '------------------------------------------------<br>';
    }
 /*   //=============== GETTERS ====================
    function testGetNome() {
        //$this->usuario = new usuario('testUserTest', 'Tester da Silva', 'ts@politicTest.com');
        $this->assertIdentical($this->usuario->getNome(), "Tester da Silva");
        echo 'testGetNome executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetEmail() {
        //$this->usuario = usuario('testUserTest', 'Tester da Silva', 'ts@politicTest.com');
        $this->assertIdentical($this->usuario->getEmail(), "ts@politicTest.com");
        echo 'testGetEmail executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetLogin() {
        //$this->usuario = usuario('testUserTest', 'Tester da Silva', 'ts@politicTest.com');
        $this->assertIdentical($this->usuario->getLogin(), "testUserTest");
        echo 'testGetLogin executado<br>';
        echo '------------------------------------------------<br>';
    }
    //=============== ACESSO AO BD =================
	//1 - cadastra usuário no banco de dados
	//--------------------------------------------------------------
	
	function testInsereUserBD() {
        //$this->usuario = usuario('testUserTest', 'Tester da Silva', 'ts@politicTest.com');
        $this->assertTrue($this->usuario->insertUserBD('T3sInsert'));
        echo 'testInsereUserBD executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testAutenticar() {
        //$this->usuario = usuario('testUserTest', 'Tester da Silva', 'ts@politicTest.com');
        $this->assertTrue($this->usuario->autenticar('T3sInsert'));
        echo 'testAutenticar executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetTipo() {
        //$this->usuario = usuario('testUserTest', 'Tester da Silva', 'ts@politicTest.com');
        $this->assertTrue($this->usuario->getTipo('testUserTest'));
        echo 'testGetTipo executado<br>';
        echo '------------------------------------------------<br>';
        //limpando o BD
        $this->dao->remove('testUserTest', "usuario");
    }
    */
}
?>
