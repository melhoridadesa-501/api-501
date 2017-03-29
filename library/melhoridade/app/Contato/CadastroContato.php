<?php

namespace melhoridade\app\Contato;

class CadastroContato
{
    private $nome;
    private $telefone;
    private $email;

    public function setContato($sNome,$sTelefone,$sEmail){
        $this->nome = $sNome;
        $this->telefone = $sTelefone;
        $this->email = $sEmail;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getEmail(){
        return $this->email;
    }
}

