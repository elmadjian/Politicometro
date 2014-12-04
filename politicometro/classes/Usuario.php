<?php
/*====================================================================
 *
* CLASSE: Usuario
* DESCRIÇÃO: representa uma entidade "usuário"
*
=====================================================================*/
require_once('DAL/Dao.php');

class Usuario {

	private $dao;
	private $nome;
	private $email;
	private $login;

	//=============== CONSTRUTOR =================
	function __construct($nome = 'none', $email = 'none', $login = 'none') {
		$this->dao = new Dao();
		$this->nome = $nome;
		$this->email = $email;
		$this->login = $login;
		
		//constrói usuário a partir do BD
		if ($nome == 'none' || $email == 'none' || $login == 'none')
			$this->getUserDB();
	}
	
		
	
	//=============== GETTERS ====================
	//devolve o nome completo do usuário
	public function getNome() {
		return $this->nome;
	}
	
	//devolve o email do usuário
	public function getEmail() {
		return $this->email;
	}
	
	//retorna o login do usuário
	public function getLogin() {
		return $this->login;
	}
	
	//=============== ACESSO AO BD =================
	//1 - cadastra usuário no banco de dados
	//--------------------------------------------------------------
	public function insertUserBD($senhaDesprotegida) {
		
		$senha = hash('sha512', $senhaDesprotegida);
		$usuario = array(
			'nome'  => $this->nome,
			'email' => $this->email,
			'login' => $this->login,
			'tipo'  => 'comum',
			'senha' => $senha
		);
		if (!$this->dao->insert($usuario, 'usuario'))
			echo "ERRO: não foi possível inserir o usuário no BD!";
	}
	
	//2 - acessa os dados cadastrados do usuário no BD
	//-------------------------------------------------------------
	private function getUserBD() {
		
	}
	
	
}