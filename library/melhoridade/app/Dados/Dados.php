<?php 

	namespace melhoridade\app\Dados;

	interface Dados {
		public function buscarDados();
		public function inserirDados();
		public function alterarDados();
		public function suspenderDados();
	}
?>