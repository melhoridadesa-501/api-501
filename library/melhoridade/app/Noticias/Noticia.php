<?php
     
    namespace melhoridade\app\Noticias;
    use melhoridade\app\Dados\Dados;
    use melhoridade\app\Dados\Banco;
    use \PDO;

    /*
    *  @author: Matheus Catossi <matheuscatossi@gmail.com>
    */

 class Noticia implements Dados 
 {

    private $id;
    private $titulo;
    private $descricao;
    private $data_id_data;
    private $data_atualiza;
    private $usuario_id_usuario;
    private $status_id_status;
    private $conn;

    public function __construct()
    {
        $banco = new Banco();
        $this->conn = $banco->conecta();
    }

    public function encodingNoticia($array) 
    {
        foreach ($array as $key => $value) {
            foreach ($value as $key_value => $array_value) {
                $array[$key][$key_value] = mb_convert_encoding($array_value,"UTF-8","auto");
            }
        }
        return $array;
    }

    public function buscarDados($id)
    {
        $sql = "SELECT id_noticia, titulo, descricao, data_id_data, usuario_id_usuario, status_id_status FROM noticia WHERE id_noticia = {$id}";
        $result = $this->conn->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $array_noticias[]= $row;
        }
        return $this->encodingNoticia($array_noticias);
    }

    public function buscarTodosDados()
    {
        
        $sql = 'SELECT id_noticia, titulo, descricao, data_id_data, usuario_id_usuario, status_id_status FROM noticia';
        $result = $this->conn->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $array_noticias[]= $row;
        }
        return $this->encodingNoticia($array_noticias);
    }

    public function inserirDados()
    {
        return true;
    }

    public function inserirNoticia($id_noticia, $titulo, $descricao, $data_id_data, $usuario_id_usuario, $status_id_status)
    {
        $this->id_noticia          = $id_noticia;
        $this->titulo              = $titulo;
        $this->descricao           = $descricao;
        $this->usuario_id_usuario  = $usuario_id_usuario;
        $this->data_id_data        = date("Y-m-d");
        $this->status_id_status     = $status_id_status;

        $sql = "INSERT INTO noticia (id_noticia, titulo, descricao, usuario_id_usuario, data_id_data, status_id_status) VALUES('{$id_noticia}','{$titulo}','{$descricao}','{$usuario_id_usuario}','{$data_id_data}','{$status_id_status}')";
        $result = $this->conn->query($sql);

        $response['status'] = true;

        return $response;
    }

    public function alterarDados($id, $campo, $valor)
    {
        $this->$id = $id;

        if($campo == 'status') {
            if(!is_numeric($valor))
                $this->$status_id_status = $this->consultarStatus($valor);
            else
                $this->$status_id_status = $valor;
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
    	return $status_alpha;
    }
}