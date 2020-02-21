<?php
namespace App\Model;

use App\Model\ClassConexao;
use App\Model\ClassDados;


class ClassAgenda extends ClassConexao{
    
    private $Db;

    protected function listaEventos($colabId,$start)
    {
        $this->Db = $this->conexaoDB();
        // $sql = "SELECT id,
        // case allday
        //     when 1 then DATE_FORMAT(start,'%Y-%m-%d')
        //     when 0 then start
        // end as start,
        // case allday
        //     when 1 then DATE_FORMAT(end,'%Y-%m-%d')
        //     when 0 then end
        // end as end,
        // title,
        // allday 
        // FROM AGENDA
        // where (date(start) >= '$start')";
        
        $sql = "select id, 
                    title, 
                    case allday
                        when 1 then DATE_FORMAT(start,'%Y-%m-%d')
                        when 0 then start
                    end as start,
                    case allday
                        when 1 then DATE_FORMAT(end,'%Y-%m-%d')
                        when 0 then end
                        end as end,	
                    cliente.idCli,
                    cliente.nome as nomeCli,
                    cliente.celular as celCli,
                    colaborador.idColab, 
                    colaborador.nome as nomeColab
                from agenda
                left join cliente on cliente.idCli = agenda.idCli
                left join colaborador on colaborador.idColab = agenda.idColab
            where (date(start) >= '$start')";
        if ($colabId > 0){
            $sql = $sql." and colaborador.idColab = $colabId";
        }
        $result = mysqli_query($this->Db,$sql);

        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        return json_encode($events);
    }

    protected function addAgenda($title,$start,$end,$allday,$idCli,$idColab)
    {   
        $this->Db = $this->conexaoDB();
        $sql = "INSERT INTO AGENDA(
            title ,
            allday ,
            start ,
            end ,
            idCli,
            idColab
            )
            VALUES (
            '".mysqli_real_escape_string($this->Db,$title)."',
            '".$allday."',
            '".mysqli_real_escape_string($this->Db,date('Y-m-d H:i:s',strtotime($start)))."',
            '".mysqli_real_escape_string($this->Db,date('Y-m-d H:i:s',strtotime($end)))."',
            '".mysqli_real_escape_string($this->Db,$idCli)."',
            '".mysqli_real_escape_string($this->Db,$idColab)."'
            )";
//        echo $sql;

        try {
            $this->Db->query($sql);
            $return["insertedId"] = $this->Db->insert_id;
            // if (mysqli_query($this->Db,$sql)){
            //     $return["insertedId"] = mysqli_insert_id($this->Db);
            // }else{ 
            //     return false;
            // };
    
        } catch (mysqli_sql_exception $e) {
            $return["SQL"] = $sql;
            $return["Error"] = $e->errorMessage();
        }
        return $return;
    }

    protected function atualizaEvento($id,$title,$allday,$start,$end,$idCli,$idColab)
    {   
        if ($id > 0) {
            $this->Db = $this->conexaoDB();
            $sql = "UPDATE AGENDA set 
            title = '".mysqli_real_escape_string($this->Db,$title)."', 
            start = '".mysqli_real_escape_string($this->Db,date('Y-m-d H:i:s',strtotime($start)))."', 
            end = '".mysqli_real_escape_string($this->Db,date('Y-m-d H:i:s',strtotime($end)))."', 
            idCli = '".mysqli_real_escape_string($this->Db,$idCli)."', 
            idColab = '".mysqli_real_escape_string($this->Db,$idColab)."' 
            where id = '".mysqli_real_escape_string($this->Db,$id)."'";
            try {
                $this->Db->query($sql);
                $return["updatedId"] = $id;
            } catch (mysqli_sql_exception $e) {
                $return["SQL"] = $sql;
                $return["Error"] = $e->errorMessage();
            }
        } else {
            $return = $this->addAgenda($title,$start,$end,$allday,$idCli,$idColab);
        };
        return json_encode($return);
    }

    protected function delEvento($id)
    {   

        $this->Db = $this->conexaoDB();

        // $driver = new mysqli_driver();
        // $driver->report_mode = MYSQLI_REPORT_STRICT;

        $sql = "DELETE FROM `itenstransacao` WHERE idAgenda = $id";
        try {
            $this->Db->query($sql);
            $sql="DELETE from AGENDA where id = '$id'";
            $this->Db->query($sql);
            $return["deletedId"] = $id;

        } catch (mysqli_sql_exception $e) {
            $return["SQL"] = $sql;
            $return["Error"] = $e->errorMessage();
        }
        return $return;
    }
 
    public function TotalAgendamentos(){
            // $this->Db = $this->conexaoDB();
            // $result=$this->Db->query("SELECT count(id) as total from agenda");
            // $data=mysqli_fetch_assoc($result);
            // echo $data['total'];
             $sql = "SELECT count(id) as conta from agenda";
             $dados = new ClassDados();
            $retorno = json_decode($dados->dadosJson($sql),true);
            echo $retorno['dados'][0]['conta'];
            // echo $retorno['result']['sql'];
    }


}
