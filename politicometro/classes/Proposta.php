<?php
/*====================================================================
 * 
 * CLASSE: Proposta
 * DESCRIÇÃO: representa uma proposta de um político
 * 
 =====================================================================*/
require_once(dirname(__FILE__).'/../DAL/Dao.php');
require_once(dirname(__FILE__).'/Politico.php');

class Proposta {
	
	private $dao;
	private $id;
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
	function __construct($area = 'none', $politico = 'none', $informante = 'none', 
			$descricao = 'none', $fonte = 'none') {
		$this->dao = new Dao();
		$this->areaAtuacao = $area;
		$this->statusCumprimento = "naoClassificada";
		$this->procedencia = 0;
		$this->classificacao = "naoClassificada";
		$this->proponente = $politico;
		$this->informante = $informante;
		$this->relevancia = "naoClassificada";
		$this->descricao = $descricao;
		$this->fonte = $fonte;
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
	
	//devole o identificador único da proposta
	public function getID() {
		return $this->id;
	}
	
	
	//=============== SETTERS ====================
	//Confirma a procedência da proposta
	public function setProcedencia($value) {
		$this->procedencia = $value;
		$this->dao->updateFieldBD('proposta', 'procedencia', $value, 'id', $this->id);
	}
	
	//Define o status de cumprimento
	public function setStatusCumprimento($value) {
		$this->statusCumprimento = $value;
		$this->dao->updateFieldBD('proposta', 'status', $value, 'id', $this->id);
	}
	
	//Define a classificação da proposta
	public function setClassificacao($value) {
		$this->classificacao = $value;
		$this->dao->updateFieldBD('proposta', 'classificacao', $value, 'id', $this->id);
	}
	
	//Define a relevância da proposta
	public function setRelevancia($value) {
		$this->relevancia = $value;
		$this->dao->updateFieldBD('proposta', 'relevancia', $value, 'id', $this->id);
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
		if (!$this->dao->insert($propostas, 'proposta')){
			echo "ERRO: não foi possível inserir proposta no BD!";
			return false;
		}
		return true;
	}
	
	//2 - recupera proposta salva no BD
	//----------------------------------------------------------
	public function getPropostaBD($id) {
		
		$entrada = $this->dao->getData('proposta', 'id', $id);
		$resource = array_pop($entrada);
		if ($resource) {
			$this->id = $id;
			$this->areaAtuacao = $resource['area'];
			$this->statusCumprimento = $resource['status'];
			$this->procedencia = $resource['procedencia'];
			$this->classificacao = $resource['classificacao'];
			$this->proponente = $resource['proponente'];
			$this->informante = $resource['informante'];
			$this->relevancia = $resource['relevancia'];
			$this->descricao = $resource['descricao'];
			$this->fonte = $resource['fonte'];
			return true;
		}
		return false;
	}
	
	//3 - verifica se uma proposta salva no BD tem campos
	//    idênticos aos atributos da proposta atual
	//----------------------------------------------------------
	private function propostaIgualBD() {
		
	}
	
}
?>
