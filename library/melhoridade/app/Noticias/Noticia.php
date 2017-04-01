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
    private $banco;

    public function __construct()
    {
        $this->banco = new Banco();
    }

    public function buscarDados($id)
    {
        $noticia['titulo'] = "xx";
        return $noticia;
    }

    public function buscarTodosDados()
    {
        $pdo = $this->banco->conecta();

        $sql = 'SELECT id_noticia, titulo, descricao, data_id_data, usuario_id_usuario, status_id_status FROM noticia';
        $result = $pdo->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $array_noticias[$row['id_noticia']]['id']                 = mb_convert_encoding($row['id_noticia'],"UTF-8","auto");
            $array_noticias[$row['id_noticia']]['titulo']             = mb_convert_encoding($row['titulo'],"UTF-8","auto");
            $array_noticias[$row['id_noticia']]['descricao']          = mb_convert_encoding($row['descricao'],"UTF-8","auto");
            $array_noticias[$row['id_noticia']]['data_id_data']       = mb_convert_encoding($row['data_id_data'],"UTF-8","auto");
            $array_noticias[$row['id_noticia']]['usuario_id_usuario'] = mb_convert_encoding($row['usuario_id_usuario'],"UTF-8","auto");
            $array_noticias[$row['id_noticia']]['status_id_status']   = mb_convert_encoding($row['status_id_status'],"UTF-8","auto");
        }

        return $array_noticias;
    }

    public function inserirDados()
    {
        $this->$titulo             = $titulo;
        $this->$descricao              = $descricao;
        $this->$usuario_id_usuario = $usuario_id_usuario;
        $this->$data_id_data           = date("Y-m-d");
        $this->status_id_status           = $this->consultarStatus("A");

        $result['status'] = true;
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
    	return $status;
    }
}