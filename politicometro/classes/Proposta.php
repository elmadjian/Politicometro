<?php
/*====================================================================
 * 
 * CLASSE: Proposta
 * DESCRIÇÃO: representa uma proposta de um político
 * 
 =====================================================================*/
require_once('DAL/Dao.php');
require_once('Politico.php');

class Proposta {
	
	private $dao;
	private $areaAtuacao;
	private $statusCumprimento;
	private $procedencia;
	private $classificacao;
	private $proponente;
	private $informante;
	private $relevancia;
	private $descricao;
	private $fonte;
	
	//=============== CONSTRUTOR =================
	function __construct($politico, $descricao, $fonte, $cumprimento) {
		$this->dao = new Dao();
		$this->proponente = $politico;
		$this->descricao = $descricao;
		$this->fonte = $fonte;
		$this->cumprimento = $cumprimento;
		$this->procedencia = 0;
		$this->relevancia = "";
	}
	
	//=============== GETTERS ====================
	//Devolve a área de atuação da proposta
	public function getAreaAtuacao() {
		return $this->areaAtuacao;
	}
	
	//Retorna o status de cumprimento da proposta
	public function getStatusCumprimento() {
		return $this->statusCumprimento;
	}
	
	//Devolve a procedência da proposta, caso tenha sido verificada
	public function getProcedencia() {
		return $this->procedencia;
	}
	
	//Devolve a classificação da proposta, caso tenha sido classificada
	public function getClassificacao() {
		return $this->classificacao;
	}
	
	//Devolve o objeto político responsável pela proposta
	public function getProponente() {
		return $this->proponente;
	}
		
	//Retorna o usuário que submeteu a proposta
	public function getInformante() {
		return $this->informante;
	}
	
	//Retorna a relevância da proposta, caso tenha sido classificada
	public function getRelevancia() {
		return $this->relevancia;
	}
	
	//Devolve a descrição da proposta
	public function getDescricao() {
		return $this->descricao;
	}
	
	//Devolve a fonte de verificação da proposta
	public function getFonte() {
		return $this->fonte;
	}
	
	//============= ACESSO AO BD =================
	//1 - salva a proposta no BD
	//----------------------------------------------------------
	public function insertPropostaBD() {
		
		$propostas = array(
			'area'          => $this->areaAtuacao,
			'status'        => $this->statusCumprimento,
			'procedencia'   => $this->procedencia,
			'classificacao' => $this->classificacao,
			'proponente'    => $this->proponente,
			'informante'    => $this->informante,
			'relevancia'    => $this->relevancia,
			'descricao'     => $this->descricao,
			'fonte'         => $this->fonte
 		);
		if (!$this->dao->insert($propostas, 'proposta'))
			echo "ERRO: não foi possível inserir proposta no BD!";
	}
	
	//2 - recupera proposta salva no BD
	//----------------------------------------------------------
	private function getPropostaBD() {
		
		
	}
	
	//3 - verifica se uma proposta salva no BD tem campos
	//    idênticos aos atributos da proposta atual
	//----------------------------------------------------------
	private function propostaIgualBD() {
		
	}
	
}
?>