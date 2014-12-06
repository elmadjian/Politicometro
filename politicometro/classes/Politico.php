<?php
/*====================================================================
 *
 * CLASSE: Politico
 * DESCRIÇÃO: representa uma entidade "político"
 *
 =====================================================================*/
require_once(dirname(__FILE__).'/../DAL/Dao.php');
require_once(dirname(__FILE__).'/Proposta.php');

class Politico {

	private $dao;
	private $cargo;
	private $nome;
	private $partido;
	private $registro;
	private $propostas;

	//=============== CONSTRUTOR =================
	function __construct($registro) {
		$this->dao = new Dao();
		$this->loadAtributosBD($registro);
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
		
		
	}
	
	//2 - pega todas as propostas de um político e coloca numa lista
	//--------------------------------------------------------------
	private function loadAtributosBD($registro) {
		
		$retorno = $this->dao->getDataFromColumn('nome','politico', 'registro', $registro);
		$this->nome = array_pop(array_pop($retorno));

        $retorno = $this->dao->getDataFromColumn('cargo','politico', 'registro', $registro);
		$this->cargo = array_pop(array_pop($retorno));

        $retorno = $this->dao->getDataFromColumn('partido','politico', 'registro', $registro);
		$this->partido = array_pop(array_pop($retorno));

        $retorno = $this->dao->getDataFromColumn('registro','politico', 'registro', $registro);
		$this->registro = array_pop(array_pop($retorno));
	}
	
	
}
