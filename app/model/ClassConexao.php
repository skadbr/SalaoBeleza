<?php
namespace App\Model;

abstract class ClassConexao{
    public function conexaoDB()
    {
        try{
//            $Con=new \PDO("mysql:host=".HOST.";dbname=".DB."","".USER."","".PASS."");
            $Con = mysqli_connect("".HOST."","".USER."","".PASS."","".DB."") or die(mysqli_error($Con));
//            var_dump($Con);
            return $Con;
        }
        catch (mysqli_sql_exception $Erro){
            return $Erro;
        }
    }
}