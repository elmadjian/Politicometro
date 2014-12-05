<?php
/*====================================================================
 * 
 * CLASSE: TestDeUnidadeUsuario
 * DESCRIÇÃO: executa os testes de unidade para a classe Usuario
 * 
 =====================================================================*/
 
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/../classes/Usuario.php');
require_once(dirname(__FILE__) .'/../DAL/Dao.php');

class TestDeUnidadeUsuario extends UnitTestCase {
    private $usuario;    
    
    function __construct() {
        parent::__construct('Testes de Unidade : classe Usuario');
        $this->usuario = new usuario('testUserTest', 'Tester da Silva', 'ts@politicTest.com');
        $this->dao = new dao();
    }
    //===============  VIDA  ====================
    function testVerdadeAbsoluta() {
        $this->assertTrue(true);
        echo 'testVerdadeAbsoluta executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testCriacaoDeObjeto() {
        $this->expectError();
            new usuario("");
	    $this->assertTrue(new usuario(10));
        $this->assertNotNull($this->usuario);
        echo 'testCriacaoDeObjeto executado<br>';
        echo '------------------------------------------------<br>';
    }
    //=============== GETTERS ====================
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
        //$this->usuario = new usuario('testUserTest');
        $this->assertTrue($this->usuario->insertUserBD('T3sInsert'));
        echo 'testInsereUserBD executado<br>';
        echo '------------------------------------------------<br>';
    }
    /*//2 - acessa os dados cadastrados do usuário no BD
	//-------------------------------------------------------------
	private function getUserBD($login) {
		
		$resource = $this->dao->getData('usuario', 'login', $login);
		if ($resource) {
			$this->nome  = $resource['nome'];
			$this->email = $resource['email'];
			$this->login = $resource['login'];
		}
	}
	
	//3 - autentica o usuário por meio do BD
	//------------------------------------------------------------
	public function autenticar($senhaDesprotegida) {
		
		$senha = hash('sha512', $senhaDesprotegida);
		$resource = $this->dao->getDataFromColumn('senha', 'usuario', 'login', $this->login);
		if (!$resource)
			return false;
		if ($senha != $resource['senha'])
			return false;
		return true;
	}
	
	//4 - descobre qual o grau de acesso do usuário
	//-----------------------------------------------------------
	public function getTipo() {

		$resource = $this->dao->getDataFromColumn('tipo', 'usuario', 'login', $this->login);
		if ($resource)
			return $resource['tipo'];
	}

*/
}
?>
