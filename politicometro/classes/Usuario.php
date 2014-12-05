<?php
/*====================================================================
 *
 * CLASSE: Usuario
 * DESCRIÇÃO: representa uma entidade "usuário"
 *
 =====================================================================*/
require_once(dirname(__FILE__).'/../DAL/Dao.php');

class Usuario {

	private $dao;
	private $nome;
	private $email;
	private $login;

	//=============== CONSTRUTOR =================
	function __construct($login, $nome = 'none', $email = 'none') {
		$this->dao = new Dao();
		$this->nome = $nome;
		$this->email = $email;
		$this->login = $login;
		
		//testa a validade do login
		if($login === '') {
			trigger_error("invalid login", E_RECOVERABLE_ERROR);
		}
		
		//constrói usuário a partir do BD
		if ($nome == 'none' || $email == 'none') {
			$this->getUserBD($login);
		}
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
		if ($this->dao->insert($usuario, 'usuario')){
			echo "ERRO: não foi possível inserir o usuário no BD!<br>";
			//echo $this->dao->insert($usuario, 'usuario').'olha so, era uma tentativa de insercao<br>';
			return false;
		}
		return true;
	}
	
	//2 - acessa os dados cadastrados do usuário no BD
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
	

	
	
}
