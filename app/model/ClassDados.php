<?php
namespace App\Model;

class ClassDados extends ClassConexao{
    private $Db;
    public function dadosJson($sql) {
        // header('Content-Type: application/json');
        $retorno = json_encode($this->execSQL($sql));
        return $retorno;
    }    
};

// $sql = "select idCli, nome, celular  
//         from cliente
//         where nome like '%$q%'
//         limit 5";

// $sql = "select * from agenda limit 3";
// echo execSQL($Con, $sql);





?>