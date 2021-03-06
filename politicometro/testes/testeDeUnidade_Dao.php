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
        echo '------------------------------------------------<br>';
    }
    function testCriacaoDeObjeto() {
        $this->assertNotNull($this->dao);
        echo 'testCriacaoDeObjeto executado<br>';
        echo '------------------------------------------------<br>';
    }
    
    //=============  SEGURANÇA  =================
    function testMysqlCheck() {
        $entrada = 'echo \'teste\'';
        $retorno = $this->dao->mysqlCheck($entrada);
        //echo $retorno.'<br>';
        $this->assertIdentical($retorno, '\'echo \\\'teste\\\'\'');
        echo 'testMysqlCheck executado<br>';
        echo '------------------------------------------------<br>';
    }
    //fazer mais testes de entrada
    function testClean() {
        $entrada = 'echo <tab> \'teste\'<br>';
        $retorno = $this->dao->clean($entrada);
        //echo $retorno.'<br>';
        $this->assertIdentical($retorno, 'echo  \'teste\''); //remove tag, mantem espacos.
        echo 'testClean executado<br>';
        echo '------------------------------------------------<br>';
    }
    
    //=============== INSERÇÃO ===================
    function testInsertComentario() {
        $dado = array(
			'autor'  => 'classe:TestDeUnidadeDao ; rotina testInsertComentario',
			'mensagem' => 'comentarioTeste(TestDeUnidadeDao)',
			'data' => strval(gettimeofday(true)),
		);
        $this->assertTrue($this->dao->insert($dado, "comentario"));
        echo 'testInsert(comentario) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testInsertNoticia() {
        $dado = array(
			'divulgador'  => 'classe:TestDeUnidadeDao ; rotina testInsertNoticia',
			'conteudo' => 'noticiaTeste(TestDeUnidadeDao)',
			'data' => gettimeofday(true),
		);
        $this->assertTrue($this->dao->insert($dado, "noticia"));
        echo 'testInsert(noticia) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testInsertPolitico() {
        //nome = char; cargo = char; partido = char; registro int
        $dado = array(
			'nome'  => 'classe:TestDeUnidadeDao , rotina testInsertPolitico',
			'cargo' => 'politicoTeste(TestDeUnidadeDao)',
			'partido' => 'partidoT',
			'registro' => 696969,
		);
        $this->assertTrue($this->dao->insert($dado, "politico"));
        echo 'testInsert(politico) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testInsertProposta() {
        $dado = array(
			'descricao' => 'classe:TestDeUnidadeDao ; rotina testInsertPolitico',
			'area'  => 'descricaoTeste(TestDeUnidadeDao)',
			'status' => 'naoCumprido',
			'procedencia' => 0,
			'classificacao' => 'naoClassificada',
			'proponente' => 696969,
			'informante' => 'informanteTeste(TestDeUnidadeDao)',
			'relevancia' => 'naoClassificada',
			'fonte' => 'fonteTeste(TestDeUnidadeDao)',
		);
        $this->assertTrue($this->dao->insert($dado, "proposta"));
        echo 'testInsert(proposta) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testInsertUsuario() {
        $dado = array(
			'nome' => 'classe:TestDeUnidadeDao ; rotina testInsertPolitico',
			'login'  => 'descricaoTeste(TestDeUnidadeDao)',
			'senha' => 'statusTeste(TestDeUnidadeDao)',
			'email' => 'procedenciaTeste(TestDeUnidadeDao)',
			'tipo' => 'classificacaoTeste(TestDeUnidadeDao)',
		);
        $this->assertTrue($this->dao->insert($dado, "usuario"));
        echo 'testInsert(usuario) executado<br>';
        echo '------------------------------------------------<br>';
    }
    //=============== RECUPERAÇÃO ===================
    function testGetData() {
        $dado = 'descricaoTeste(TestDeUnidadeDao)';
        $retorno = $this->dao->getData("usuario", 'login', $dado);
        $this->assertNotNull(array_pop($retorno));
        echo 'testGetData(usuario) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetDataFromColumn() {
        $dado = 'classe:TestDeUnidadeDao ; rotina testInsertPolitico';
        $retorno = $this->dao->getDataFromColumn('id','proposta', 'descricao', $dado);
        $this->assertNotNull(array_pop($retorno));
        echo 'testGetDataFromColumn(proposta) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testGetColumn() {
        $retorno = $this->dao->getColumn('politico', 'nome');
        $this->assertNotNull(array_pop($retorno));
        echo 'testGetColumn(politico) executado<br>';
        echo '------------------------------------------------<br>';
    }
    
    //=============== REMOÇÃO ===================
    function testRemoveUsuario() {
        $dado = 'descricaoTeste(TestDeUnidadeDao)';
        $this->assertTrue($this->dao->remove($dado, "usuario"));
        echo 'testRemove(usuario) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testRemovePolitico() {
        $dado = 696969;
        $this->assertTrue($this->dao->remove($dado, "politico"));
        echo 'testRemove(politico) executado<br>';
        echo '------------------------------------------------<br>';
    }
    function testRemoveProposta() {
        $this->assertNotNull($retorno = $this->dao->getDataFromColumn('id','proposta', 'descricao', 'classe:TestDeUnidadeDao ; rotina testInsertPolitico'));
        $this->assertTrue($this->dao->remove(array_pop($retorno[0]), "proposta"));
        echo 'testRemove(proposta) executado<br>';
        echo '------------------------------------------------<br>';
    }

}

?>


