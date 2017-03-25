<?php

namespace melhoridade\app\Usuario;
use melhoridade\app\Dados\Dados;

class Usuario implements Dados
{
	protected $nome;
	protected $email;
	protected $dataCriacao;
	protected $dataAtuali;
	protected $dataNasc;

	public function buscarTodosDados();
	public function buscarDados($id);
	public function inserirDados();
	public function alterarDados($id, $campo, $valor);
	public function suspenderDados();

	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setDataCriacao($data)
	{
		$this->dataCriacao = $data;
	}

	public function setDataAtuali($data)
	{
		$this->dataAtuali = $data;
	}

	public function setdataNasc($data)
	{
		$this->dataNasc = $data;
	}


}