<?php
namespace App\Model;

abstract class ClassConexao{
    public $Con;
    public function conexaoDB()
    {
        try{
//            $Con=new \PDO("mysql:host=".HOST.";dbname=".DB."","".USER."","".PASS."");
            $this->Con = mysqli_connect("".HOST."","".USER."","".PASS."","".DB."") or die(mysqli_error($Con));
//            var_dump($Con);
            return $this->Con;
        }
        catch (mysqli_sql_exception $Erro){
            return $Erro;
        }
    }

    public function execSQL($sql) {
        $this->conexaoDB();
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        //   mysqli_report(MYSQLI_REPORT_ERROR);
        $retorno = null;
        $row_set = (array) null;
        $result = mysqli_query($this->Con,$sql); 
        $retorno['status'] = 'ok';
        $retorno['numrows'] = mysqli_num_rows($result);
        $retorno['sql'] = $sql;
        while($row = mysqli_fetch_assoc($result)) 
        {
            $row_set[] = $row;
        }
        mysqli_free_result($result);
        mysqli_close($this->Con);
        $saida = array(
                "result"=>	$retorno,
                "dados"	=>	$row_set);
        return $saida;
        // return $saida;
    }

}