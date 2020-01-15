<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassAgenda extends ClassConexao{
    
    private $Db;
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
        mysqli_query($this->Db,$sql);
        echo '{"id":"'.mysqli_insert_id($this->Db).'"}';
    }

    protected function listaEventos($start)
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

        $result = mysqli_query($this->Db,$sql);

        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        return json_encode($events);
    }

    protected function atualizaEvento($id,$title,$start,$end,$idCli,$idColab)
    {   
        $this->Db = $this->conexaoDB();
        
        $sql = "UPDATE AGENDA set 
        title = '".mysqli_real_escape_string($this->Db,$title)."', 
        start = '".mysqli_real_escape_string($this->Db,date('Y-m-d H:i:s',strtotime($start)))."', 
        end = '".mysqli_real_escape_string($this->Db,date('Y-m-d H:i:s',strtotime($end)))."', 
        idCli = '".mysqli_real_escape_string($this->Db,$idCli)."', 
        idColab = '".mysqli_real_escape_string($this->Db,$idColab)."' 
        where id = '".mysqli_real_escape_string($this->Db,$id)."'";
        
        try {
            $result=$this->Db->query($sql);
            $return["affected_rows"] = $this->Db->affected_rows;
        } catch (mysqli_sql_exception $e) {
            $return["SQL"] = $sql;
            $return["Error"] = $e->errorMessage();
        }
        return json_encode($return);

        // return '[{"affected_rows":'.$this->Db->affected_rows.'}]';

        // mysqli_query($this->Db,$sql);
        // if (mysqli_affected_rows($this->Db) > 0) {
        //     echo mysqli_affected_rows($this->Db);
        // }
        //     echo mysqli_affected_rows($this->Db);
        // exit;
    }

    protected function delEvento($id)
    {   
        $this->Db = $this->conexaoDB();
        $sql="DELETE from AGENDA where id = '$id'";
        mysqli_query($this->Db,$sql);
        if (mysqli_affected_rows($this->Db) > 0) {
            return "1";
        }
        var_dump($this->Db);
        exit;
    }
 
    public function TotalAgendamentos(){
            $this->Db = $this->conexaoDB();
            $result=$this->Db->query("SELECT count(id) as total from agenda");
            $data=mysqli_fetch_assoc($result);
            echo $data['total'];
    }

}
