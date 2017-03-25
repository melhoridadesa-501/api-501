<?php
     
    namespace melhoridade\app\Noticias;
    use melhoridade\app\Dados\Dados;

    /*
    *  @author: Matheus Catossi <matheuscatossi@gmail.com>
    */

 class Noticia implements Dados 
 {

    private $id;
    private $titulo;
    private $descr;
    private $data_cri;
    private $data_atualiza;
    private $id_usuario_sistema;
    private $id_status;

    public function __construct()
    {

    }

    public function buscarDados($id)
    {
        $noticia['titulo'] = "xx";
        return $noticia;
    }

    public function buscarTodosDados()
    {
        $noticia[]['titulo'] = "xx";
        $noticia[]['titulo'] = "xx";
        $noticia[]['titulo'] = "xx";
        $noticia[]['titulo'] = "xx";
        $noticia[]['titulo'] = "xx";
        return $noticia;
    }

    public function inserirDados()
    {
        $this->$titulo             = $titulo;
        $this->$descr              = $descr;
        $this->$id_usuario_sistema = $id_usuario_sistema;
        $this->$data_cri           = date("Y-m-d");
        $this->id_status           = $this->consultarStatus("A");

        $result['status'] = true;
    }

    public function alterarDados($id, $campo, $valor)
    {
        $this->$id = $id;

        if($campo == 'status') {
            if(!is_numeric($valor))
                $this->$id_status = $this->consultarStatus($valor);
            else
                $this->$id_status = $valor;
        }
    }

    public function suspenderDados()
    {

    }

    public function consultarNoticia()
    {
    
    }

    private function consultarStatus($status_alpha) 
    {
    	return $status;
    }
}