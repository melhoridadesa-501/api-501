<?php

/**
* Cadastro de idoso da API
* @author: Gabriel Vieira
* @type: Cadastro
*/

require_once __DIR__.'./../vendor/autoload.php';

namespace melhoridade\app\Idoso;
use melhoridade\app\Dados\Banco;
use melhoridade\app\Dados\Dados;
use \PDO;

	class CadastroIdoso
			extends Banco
			implements Dados
	{
		protected $logradouro;
		protected $tipo_logradouro;
		protected $numero;
		protected $complemento;
		protected $bairro;
		protected $cidade;
		protected $uf;

		public function __construct($dados)
		{
			$this->logradouro = $dados['logradouro'];
			$this->tipo_logradouro = $dados['tipo_logradouro'];
			$this->numero = $dados['numero'];
			$this->complemento = $dados['dados'];
			$this->bairro = $dados['bairro'];
			$this->cidade = $dados['cidade'];
			$this->uf = $dados['uf'];
		}

		public function buscarTodosDados()
		{
			$select = $conn->query("SELECT MAX(id_idoso) FROM idoso");
			return $select;
		}

		public function buscarDados($id){}

		public function inserirDados()
		{
				//	INSERINDO NA TABELA IDOSO
			$insertIdoso = "INSERT INTO idoso(logradouro,
										tipo_logradouro,
										numero,
										complemento,
										baiiro,
										cidade,
										uf,
										usuario_id_usuario)
								VALUES(:logradouro,
										:tipo_logradouro,
										:numero,
										:complemento,
										:baiiro,
										:cidade,
										:uf,
										:usuario_id_usuario)";

			$stmt->pdo->prepare($insertIdoso);
			$stmt->bindParam(':logradouro', $this->logradouro);
			$stmt->bindParam(':tipo_logradouro', $this->tipo_logradouro);
			$stmt->bindParam(':numero', $this->numero);
			$stmt->bindParam(':complemento', $this->complemento);
			$stmt->bindParam(':bairro', $this->baiiro);
			$stmt->bindParam(':cidade', $this->cidade);
			$stmt->bindParam(':uf', $this->uf);
			$stmt->bindParam(':usuario_id_usuario', $this->buscarTodosDados());

			if($stmt->execute()) {
				header("Location: localhost:8001/contato");
			} else {
				die('Erro ao cadastrar');
			}
		}

		public function alterarDados($id, $campo, $valor){}
		public function suspenderDados(){}
	}

	$banco = new Banco();
	$this->conn = $banco->conecta();

	$cadastroIdoso = new CadastroIdoso($_POST);