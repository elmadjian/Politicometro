<?php
/*====================================================================
 * 
 * CLASSE: Dao
 * DESCRIÇÃO: provê acesso ao banco de dados
 * 
 =====================================================================*/

class Dao {
	
	private $connection;
	private $host;
	
	//=============== CONSTRUTOR =================
	function __construct() {
		
		if (!isset($GLOBALS['connection'])) {	
			//****** IMPORTANTE: configurações da conta MYSQL AQUI! ****//
			$this->host = 'mysql4.000webhost.com';
			$this->connection = $this->connectDB('a5091158_guest', 'guest123');
			$GLOBALS['connection'] = $this->connection;
			//**********************************************************//
		}
		else if (isset($GLOBALS['connection']))
			$this->connection = $GLOBALS['connection'];
		else {
			echo "ERRO ao tentar conectar neste banco de dados";
			die();
		}
		mysqli_query($this->connection, "SET NAMES 'utf8'");
		mysqli_query($this->connection, 'SET character_set_connection=utf8');
		mysqli_query($this->connection, 'SET character_set_client=utf8');
		mysqli_query($this->connection, 'SET character_set_results=utf8');
		
	}
	
	//=============== CONEXÃO ====================
	//1 - conecta ao DB e devolve o link da conexão, se bem-sucedida
	//--------------------------------------------------------------
	private function connectDB($user = 'guest', $password = 'guest') {
		
		$connection = mysqli_connect($this->host, $user, $password);
		if (!$connection)
			return false;
		//****** IMPORTANTE: configurações da conta MYSQL AQUI! ****//
		if (!mysqli_select_db($connection, 'a5091158_pol'))
		//**********************************************************//
			return false;
		return $connection;
	}
	
	
	//=============== SEGURANÇA ===================
	//1 - protege contra SQL injection. Recebe a string com possível
	//    injection, trata-a e a devolve
	//--------------------------------------------------------------
//	static function mysqlCheck($palavra) { You cannot use $this in a static method.
    function mysqlCheck($palavra) {
		if ($this->connection) { //precisa disto?
			if (get_magic_quotes_gpc())
				$palavra = stripslashes($palavra);
			if (!is_numeric($palavra))
				$palavra = "'".mysql_real_escape_string($palavra)."'";
			return $palavra;
		}
	}
	
	//2 - retira caracteres possivelmente maliciosos da string,
	//    como tags para inserção de scripts
	//--------------------------------------------------------
	static function clean($text) {
		//retira os espaços, tabs, quebras de linha, nulls:
		$txt = trim($text);
		//retira HTML e PHP tags
		$txt = strip_tags($txt);
		return $txt;
	}
	
	
	//=============== INSERÇÃO ===================
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
	
	//2 - insere comentário no BD
	//--------------------------------------------------------------
	private function insert_comentario($data) {
		$query = "INSERT INTO comentario (autor, mensagem, data)
				  VALUES ({$data['autor']}, {$data['mensagem']}, {$data['data']})";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
	
	//3 - insere notícia no BD
	//--------------------------------------------------------------
	private function insert_noticia($data) {
		$query = "INSERT INTO noticia (data, conteudo, divulgador)
		          VALUES ({$data['data']}, {$data['conteudo']}, {$data['divulgador']})";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
	
	//4 - insere político no BD
	//--------------------------------------------------------------
	private function insert_politico($data) {
		$query = "INSERT INTO politico (nome, cargo, partido, registro)
		          VALUES ('{$data['nome']}', '{$data['cargo']}', '{$data['partido']}', 
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
		          '{$data['classificacao']}', '{$data['proponente']}', '{$data['informante']}',
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
	
	//7 - altera um campo específico de uma tabela
	//---------------------------------------------------------------
	public function updateFieldBD($table, $field, $value, $id, $valueID) {
		$query = "UPDATE {$table}
		          SET {$field} = '{$value}'
		          WHERE {$id} = '{$valueID}'";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
	
	
	//=============== RECUPERAÇÃO ===================
	//1 - devolve todas as linhas que fazem match $field = $value
	//------------------------------------------------
	public function getData($table, $field, $value) {
		
		$query = "SELECT *
				  FROM {$table}
				  WHERE {$field} = '{$value}'";
		$resource = mysqli_query($this->connection, $query);
		if ($resource) {
			$entradas = array();
			while ($data = mysqli_fetch_array($resource))
				array_push($entradas, $data);
			return $entradas;
		}
	}
	
	//2 - devolve todas as ocorrências em uma coluna que
	//    fazem o match $field = $value
	//------------------------------------------------
	public function getDataFromColumn($column, $table, $field, $value) {
		
		$query = "SELECT {$column}
				  FROM {$table}
				  WHERE {$field} = '{$value}'";
		$resource = mysqli_query($this->connection, $query);
		if ($resource) {
			$entradas = array();
			while($data = mysqli_fetch_array($resource))
				array_push($entradas, $data);
			return $entradas;
		}
	}
	
	//3 - devolve todos os elementos da coluna XX de uma tabela
	//-------------------------------------------------
	public function getColumn($table, $column) {
	
		$query = "SELECT {$column}
		FROM {$table}";
		$resource = mysqli_query($this->connection, $query);
		if ($resource) {
		$entradas = array();
		while($data = mysqli_fetch_array($resource))
			array_push($entradas, $data);
			return $entradas;
		}
	}
	
	
	
	//=============== REMOÇÃO ===================
	//1 - remove uma entrada de uma tabela específica do BD
	//--------------------------------------------------------------
	public function remove($data, $table) {
		if (!$this->connection) {
			echo "ERRO ao tentar conectar ao banco de dados: ".mysql_error();
			return false;
		}
		
		switch ($table) {
			case "comentario": return $this->remove_comentario($data);
			case "noticia":    return $this->remove_noticia($data);    
			case "politico":   return $this->remove_politico($data);
			case "proposta":   return $this->remove_proposta($data);
			case "usuario":    return $this->remove_usuario($data); 
			default: echo "ERRO: tabela inexistente no DB"; return false;
		}
	}
	
	//2 - remove comentário no BD
	//--------------------------------------------------------------
	private function remove_comentario($data) {
		/*$query = "INSERT INTO comentario (autor, mensagem, data)
				  VALUES ({$data['autor']}, {$data['mensagem']}, {$data['data']})";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;*/
		return false; //não implementado
	}
	
	//3 - remove notícia no BD
	//--------------------------------------------------------------
	private function remove_noticia($data) {
		/*$query = "INSERT INTO noticia (data, conteudo, divulgador)
		          VALUES ({$data['data']}, {$data['conteudo']}, {$data['divulgador']})";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;*/
		return false; //não implementado
	}
	
	//4 - remove político no BD
	//--------------------------------------------------------------
	private function remove_politico($value) {
		$query = "DELETE FROM politicometro.politico
				  WHERE politico.registro = '{$value}'";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
	
	//5 - remove proposta no BD
	//--------------------------------------------------------------
	private function remove_proposta($value) {
 		$query = "DELETE FROM politicometro.proposta
				  WHERE proposta.id = '{$value}'"; //??? da pra pegar o id?
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	}
	
	//6 - remove usuario do BD
	//------------------------------------------------
	public function remove_usuario($value) {
		
		$query = "DELETE FROM politicometro.usuario
				  WHERE usuario.login = '{$value}'";
		$resource = mysqli_query($this->connection, $query);
		if (!$resource)
			return false;
		return true;
	
	}
	
}




?>
