<?php
     
    namespace melhoridade\app\Noticias;
    use melhoridade\app\Dados\Dados;

	/*
	*  @author: Matheus Catossi
	*/

     class Noticia implements Dados {

        private $id;
        private $titulo;
        private $descr;
        private $data_cri;
        private $data_atualiza;
        private $id_usuario_sistema;
        private $id_status;


        public function __construct(){

        }

        public function buscarDados(){
            $noticia['titulo'] = "xx";
            return ($noticia);
        }

        public function inserirDados(){
            $this->$titulo             = $titulo;
            $this->$descr              = $descr;
            $this->$id_usuario_sistema = $id_usuario_sistema;
            $this->$data_cri           = date("Y-m-d");
            $this->id_status           = $this->consultarStatus("A");

            //return json_encode($status => true);
        }
   
        public function alterarDados(){

        }
   
        public function suspenderDados(){

        }

        public function consultarNoticia(){
        
        }

        public function alterarStatusNoticia($id, $status) {
        	$this->$id        = $id;
			
			if(!is_numeric($status))
				$this->$id_status = $this->consultarStatus;
			else
				$this->$id_status = $id_status;
	
        }

        private function consultarStatus($status_alpha) {
        	return $status;
        }


     }