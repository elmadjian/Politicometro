<?php
/*====================================================================
 * 
 * CLASSE: TestDeUnidadeDao
 * DESCRIÇÃO: executa os testes de unidade para a classe Dao
 * 
 =====================================================================*/

require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) . '/../DAL/Dao.php');

class TestDeUnidadeDao extends UnitTestCase {
    private $dao;

    function __construct() {
        parent::__construct('Testes de Unidade : classe Dao');
        $this->dao = new Dao();
    }
    
    //===============  VIDA  ====================
    function testVerdadeAbsoluta() {
        $this->assertTrue(true);
       	echo 'testVerdadeAbsoluta executado<br>';
    }
    function testCriacaoDeObjeto() {
        $this->assertNotNull($this->dao);
        echo 'testCriacaoDeObjeto executado<br>';
    }
    
    //=============  SEGURANÇA  =================
    function testMysqlCheck() {
        $entrada = 'echo \'teste\'';
        $retorno = $this->dao->mysqlCheck($entrada);
        //echo $retorno.'<br>';
        $this->assertIdentical($retorno, '\'echo \\\'teste\\\'\'');
        echo 'testMysqlCheck executado<br>';
    }
}

?>
