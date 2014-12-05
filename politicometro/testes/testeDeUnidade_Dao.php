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
    //fazer mais testes de entrada
    function testClean() {
        $entrada = 'echo <tab> \'teste\'<br>';
        $retorno = $this->dao->clean($entrada);
        //echo $retorno.'<br>';
        $this->assertIdentical($retorno, 'echo  \'teste\''); //remove tag, mantem espacos.
        echo 'testClean executado<br>';
    }
    
    //=============== INSERÇÃO ===================
    function testInsertComentario() {
        $comentario = array(
			'autor'  => 'classe:TestDeUnidadeDao ; rotina testInsertComentario',
			'mensagem' => 'comentarioTeste(TestDeUnidadeDao)',
			'data' => gettimeofday(true),
		);
        $this->assertNotNull($this->dao->insert($comentario, "comentario"));
        echo 'testInsert(comentario) executado<br>';
    }
    function testInsertNoticia() {
        $comentario = array(
			'divulgador'  => 'classe:TestDeUnidadeDao ; rotina testInsertNoticia',
			'conteudo' => 'noticiaTeste(TestDeUnidadeDao)',
			'data' => gettimeofday(true),
		);
        $this->assertNotNull($this->dao->insert($comentario, "noticia"));
        echo 'testInsert(noticia) executado<br>';
    }
    function testInsertPolitico() {
        $comentario = array(
			'nome'  => 'classe:TestDeUnidadeDao ; rotina testInsertPolitico',
			'cargo' => 'politicoTeste(TestDeUnidadeDao)',
			'partido' => 'partidoTeste(TestDeUnidadeDao)',
			'registro' => 'registroTeste(TestDeUnidadeDao)',
		);
        $this->assertNotNull($this->dao->insert($comentario, "politico"));
        echo 'testInsert(politico) executado<br>';
    }
    
    
    
    /*function testInsert() { //por ultimo
        $entrada = 'dado1';
        $retorno = $this->dao->insert($entrada, "usuario");
        $this->testInsert($retorno, 'echo  \'teste\''); //remove tag, mantem espacos.
        echo 'testInsert executado<br>';
    }*/
}

/*
//1 - insere uma entrada nova em uma tabela específica do BD
	//--------------------------------------------------------------
	public function insert($data, $table) {
		if (!$this->connection) {
			echo "ERRO ao tentar conectar ao banco de dados: ".mysql_error();
			return false;
		}
		
		switch ($table) {
			case "comentario": return $this->insert_comentario($data);
			case "noticia":    return $this->insert_noticia($data);    
			case "politico":   return $this->insert_politico($data);
			case "proposta":   return $this->insert_proposta($data);
			case "usuario":    return $this->insert_usuario($data); 
			default: echo "ERRO: tabela inexistente no DB"; return false;
		}
	}
	
	//4 - insere político no BD
	//--------------------------------------------------------------
	private function insert_politico($data) {
		$query = "INSERT INTO politico (nome, cargo, partido, registro)
		          VALUES ({$data['nome']}, {$data['cargo']}, {$data['partido']}, 
		          {$data['registro']})";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
	
	//5 - insere proposta no BD
	//--------------------------------------------------------------
	private function insert_proposta($data) {
 		$query = "INSERT INTO proposta (area, status, procedencia, classificacao,
                  proponente, informante, relevancia, descricao, fonte)
		          VALUES ('{$data['area']}', '{$data['status']}', {$data['procedencia']}, 
		          '{$data['classificacao']}', '{$data['proponente']}', {$data['informante']},
                  '{$data['relevancia']}', '{$data['descricao']}', '{$data['fonte']}')";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
	
	//6 - insere usuario no BD
	//--------------------------------------------------------------
	private function insert_usuario($data) {
		$query = "INSERT INTO usuario (login, senha, nome, email, tipo)
		          VALUES ('{$data['login']}', '{$data['senha']}', '{$data['nome']}', 
		          '{$data['email']}', '{$data['tipo']}')";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
*/
?>


