<?php
/*====================================================================
 * 
 * CLASSE: TestDeUnidadeUsuario
 * DESCRIÇÃO: executa os testes de unidade para a classe Usuario
 * 
 =====================================================================*/
 
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/../classes/Usuario.php');

class TestDeUnidadeUsuario extends UnitTestCase {
    private $usuario;    
    
    function __construct() {
        parent::__construct('Testes de Unidade : classe Usuario');
        $this->usuario = new usuario(`testUserTest`);
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
        //$this->usuario = new usuario(`testUserTest`);
        $this->assertIdentical($this->usuario->getNome(), "none");
        echo 'testGetNome executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetEmail() {
        //$this->usuario = new usuario(`testUserTest`);
        $this->assertIdentical($this->usuario->getEmail(), "none");
        echo 'testGetEmail executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetLogin() {
        //$this->usuario = new usuario(`testUserTest`);
        echo $this->usuario->getLogin(). 'aquiii!<br>' ;
        $this->assertIdentical($this->usuario->getLogin(), "testUserTest");
        echo 'testGetLogin executado<br>';
        echo '------------------------------------------------<br>';
    }
   /* function testGetProponente() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getProponente(), "politico");
        echo 'testGetProponente executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetInformante() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getInformante(), "informante");
        echo 'testGetInformante executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetRelevancia() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getRelevancia(), "naoClassificada");
        echo 'testGetRelevancia executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetDescricao() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getDescricao(), "descricao");
        echo 'testGetDescricao executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetFonte() {
        //$proposta = new proposta(0, "politico", "informante", "descricao", "fonte" );
        $this->assertIdentical($this->proposta->getFonte(), "fonte");
        echo 'testGetFonte executado<br>';
        echo '------------------------------------------------<br>';
    }*/

}
?>
