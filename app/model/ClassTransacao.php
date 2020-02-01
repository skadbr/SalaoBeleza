<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassTransacao extends ClassConexao{
    
    private $Db;
    

    public function TotalTransacoes(){
        $this->Db = $this->conexaoDB();
        $result=$this->Db->query("SELECT sum(valor) as total from transacao");
        $data=mysqli_fetch_assoc($result);
        echo 'R$ '.number_format($data['total'], 2, ',', '.');
    }

    Protected function ListAll()
    {
        // var_dump($_POST);

        $this->Db = $this->conexaoDB();
        $query = "select transacao.id, 
                        transacao.entrada_saida, 
                        transacao.data, 
                        transacao.descTransacao, 
                        cliente.nome, 
                        transacao.valor 
                    from transacao, cliente 
                    where cliente.idCli = transacao.idCli";

        if(isset($_POST["search"]["value"]))
        {
            $query .= ' and  transacao.descTransacao LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        $result = $this->Db->query($query);

        // echo $query;
        $filteredRows = $result->num_rows;

        $result->close();

        if(isset($_POST["order"])) {
            $query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $query .= ' ORDER BY id DESC ';
        }

        if(isset($_POST["length"])) {
            if($_POST["length"] != -1) {
            $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
            }
        }

        $result = $this->Db->query($query);
        $totalRows = $this->Db->affected_rows;

        $dados = array();
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            $sub_array = array();
            $sub_array[] = $row["id"];
            $sub_array[] = $row["entrada_saida"];
            $sub_array[] = date('d/m/Y H:i:s', strtotime($row["data"]));
            $sub_array[] = $row["descTransacao"];
            $sub_array[] = $row["nome"];
            $sub_array[] = number_format($row["valor"], 2, ',', '.');
            $sub_array[] =    '<div class="btn-group btn-group-sm" role="group"> <button type="button" name="update" id="'.$row["id"].'" class="btn btn-labeled btn-info btn-sm tip-top update"  title="Editar transacao '.$row["id"].'">
                <span class="btn-label">
                    <i class="fas fa-edit fa-fw fa-1x "></i>
                </span>Editar
                </button>'.
                              '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-labeled btn-danger btn-sm tip-top delete"  title="Excluir transacao '.$row["id"].'">
                <span class="btn-label">
                    <i class="fas fa-trash fa-fw fa-1x "></i>
                </span>Excluir
                </button> </div>';
            //   $sub_array[] = 1;
            // $sub_array[] =    '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-labeled btn-danger btn-sm tip-top delete"  title="Excluir transacao '.$row["id"].'">
            //     <span class="btn-label">
            //         <i class="fas fa-trash fa-fw fa-1x "></i>
            //     </span>Excluir
            //     </button>';
            $dados[] = $sub_array;
        }
        $result->close();
 
        $saida = array(
             "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$totalRows,
            "recordsFiltered"	=>	$filteredRows,
            "data"				=>	$dados
        );
//        var_dump($dados);
//        echo '<pre>'; print_r($dados); echo '</pre>'; 
//        echo '<pre>'; print_r($saida); echo '</pre>'; 
        return json_encode($saida);
    }

    public function addTransacao($data,$entrada_saida,$idAgenda,$idCli,$nome,$idColab,$valor,$descTransacao)
    {
        
        $this->Db = $this->conexaoDB();
        $sql = "INSERT INTO transacao(
                    data,
                    entrada_saida,
                    idAgenda,
                    idCli,
                    idColab,
                    valor,
                    descTransacao
            )
            VALUES (
            '".$data."',
            '".$entrada_saida."',
            ".$idAgenda.",
            ".$idCli.",
            ".$idColab.",
            ".$valor.",
            '".$descTransacao."')";
        try {
            if (mysqli_query($this->Db,$sql)) {
                $return["id"] = mysqli_insert_id($this->Db);
            } else {
                $return["SQL"] = $sql;
                $return["Error"] = 'Erro sql';
            }
        } catch (mysqli_sql_exception $e) {
            $return["SQL"] = $sql;
            $return["Error"] = $e->errorMessage();
        }
        return $return;

    }

    public function updTransacao($id,$data,$entrada_saida,$idAgenda,$idCli,$nome,$idColab,$valor,$descTransacao)
    {
        $this->Db = $this->conexaoDB();
        $sql = "UPDATE transacao
                SET data ='".$data."',
                    entrada_saida='".$entrada_saida."',
                    idAgenda=".$idAgenda.",
                    idCli=".$idCli.",
                    idColab=".$idColab.",
                    valor=".$valor.",
                    descTransacao='".$descTransacao."'
                WHERE id = ".$id;

        if (mysqli_query($this->Db,$sql)){
            return true;
        }else{ 
            return false;
        };

    }

    #Busca unica
    public function busca_unica ()
    {
        // -- WHERE id = '".$_POST["id"]."' 
        $saida = array();
        $sql =  "select transacao.id, 
                    transacao.entrada_saida, 
                    transacao.data, 
                    transacao.descTransacao, 
                    transacao.idCli, 
                    transacao.idColab,
                    transacao.idAgenda,
                    cliente.nome, 
                    cliente.celular, 
                    transacao.valor 
                from transacao, cliente 
                where cliente.idCli = transacao.idCli 
        and id = '".$_POST["id"]."' LIMIT 1";

        $this->Db = $this->conexaoDB();
        if ($result = $this->Db->query($sql)) {
            /* fetch object array */

            // while ( $linha = $result->fetch_assoc() ){
            //     $saida[] = json_encode($linha);
            // }
            // $result->close();
            // echo json_encode( $saida );

            while ($linha = $result->fetch_assoc()) {
                $saida["data"] = $linha["data"];
                $saida["entrada_saida"] = $linha["entrada_saida"];
                $saida["idAgenda"] = $linha["idAgenda"];
                $saida["idCli"] = $linha["idCli"];
                $saida["celCli"] = $linha["celular"];
                $saida["nome"] = $linha["nome"];
                $saida["idColab"] = $linha["idColab"];
                $saida["valor"] = number_format($linha["valor"], 2, ',', '.');
                $saida["descTransacao"] = $linha["descTransacao"];
            }
            /* free result set */
            $result->close();
            echo json_encode($saida);
        } else {
            echo "Erro! Não encontrou transacao: " . $Db->error;
        }
        #Fim Busca unica
    }

    #deletar transacao
    public function delete(){
        if(isset($_POST["id"]))
        {
            $sql = 'DELETE FROM transacao WHERE id = '.$_POST["id"];
            $this->Db = $this->conexaoDB();
            if ($this->Db->query($sql) === TRUE) {
                echo 'transacao Nr <strong>'.$_POST["id"].' </strong> excluido com sucesso!';
            } else {
                echo "Erro! Não conseguiu excluir transacao: " . $this->Db->error;
            }

        }
    }
    #fim deletar transacao


    public function ListaReceitaByNome($q)
    {
        // if(isset($_POST["search"])) {
        //     $q = $_POST["search"];
        // }
        $this->Db = $this->conexaoDB();
        $sql = "
                SELECT 'p' as tipo, idProdt as id, descricao as descr,vlrVenda as valbase FROM produto
                where descricao like '%$q%'
                union
                select 's' as tipo, idServ as id, descr,valbase from servico
                where descr like '%$q%' limit 10";
        $result = mysqli_query($this->Db,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $row_set[] = $row; 
            // $row_set[] = array('label'=>$row['nome'],'id'=>$row['idCli']);; 
        }
        if (isset($row_set)){
            echo json_encode($row_set);
        } else{
            echo '[{"tipo":"0","descr:"Não existe"}]';
        }
    }


    public function listaItensAgenda($idAgenda) {
        $this->Db = $this->conexaoDB();

        $query = "SELECT  itenstransacao.id, 's' as tipo,itenstransacao.idServ as idProdServ, servico.descr as descricao,  itenstransacao.qtd, itenstransacao.valor
                FROM itenstransacao, servico
                WHERE itenstransacao.idAgenda = $idAgenda
                and servico.idServ = itenstransacao.idServ
                UNION
                SELECT itenstransacao.id, 'p' as tipo, itenstransacao.idProdt as idProdServ, produto.descricao as descricao, itenstransacao.qtd,  itenstransacao.valor
                FROM itenstransacao, produto
                WHERE itenstransacao.idAgenda = $idAgenda
                and produto.idProdt = itenstransacao.idProdt
                order by tipo desc, id asc";

        try {
            $result = mysqli_query($this->Db,$query);
            while($row = mysqli_fetch_assoc($result))
            {
                $dados[] = $row; 
            }
            $retorno = array();
            if (isset($dados)){
                $retorno["status"] = 'ok';
                $retorno["msg"] = 'Finalizou com sucesso!';
                $retorno["dados"] = $dados;
            }else{
                $retorno["status"] = 'Erro';
                $retorno["msg"] = 'Não econtrou linhas!';
            }
            return $retorno;
        } catch (mysqli_sql_exception $e) {
            $return["SQL"] = $sql;
            $return["Error"] = $e->errorMessage();
        }
        return $return;




    }

    public function atualizaItemTransacao($idItemTransacao, $idAgenda, $idCli, $idColab, $idServ,$idProdt, $qtd, $valor, $descProdtServ)
    {
        $this->Db = $this->conexaoDB();
        if ($idItemTransacao && $idItemTransacao > 0) {
            $sql = "UPDATE `itenstransacao` SET 
            `idAgenda`=$idAgenda,
            `idCli`=$idCli,
            `idColab`=$idColab,
            `idServ`=$idServ,
            `idProdt`=$idProdt,
            `qtd`=$qtd,
            `valor`=$valor,
            `descProdtServ`="."'".$descProdtServ."' 
            WHERE 
            `id`=$idItemTransacao";
            try {
                if (mysqli_query($this->Db,$sql)) {
                    $return["id"] = $idItemTransacao;
                } else {
                    $return["SQL"] = $sql;
                    $return["Error"] = 'Erro sql';
                }
            } catch (mysqli_sql_exception $e) {
                $return["SQL"] = $sql;
                $return["Error"] = $e->errorMessage();
            }
            return $return;

        }else {
            $sql = "INSERT INTO `itenstransacao`(`idAgenda`, `idCli`, `idColab`, `idServ`, `idProdt`, `qtd`,`valor`, `descProdtServ`)
                    VALUES ($idAgenda, $idCli, $idColab, $idServ,$idProdt,$qtd,".number_format(str_replace(",",".",str_replace(".","",$valor)), 2, '.', '').","."'".$descProdtServ."')";
            try {
                if (mysqli_query($this->Db,$sql)) {
                    $return["id"] = mysqli_insert_id($this->Db);
                } else {
                    $return["SQL"] = $sql;
                    $return["Error"] = 'Erro sql';
                }
            } catch (mysqli_sql_exception $e) {
                $return["SQL"] = $sql;
                $return["Error"] = $e->errorMessage();
            }
            return $return;
        }

    }

    public function ExcluiItemTransacao($idItemTransacao)
    {
        if ($idItemTransacao && $idItemTransacao > 0) {
            $this->Db = $this->conexaoDB();
            $sql = "DELETE from `itenstransacao`  
            WHERE  `id`=$idItemTransacao";
            try {
                if (mysqli_query($this->Db,$sql)) {
                    $return["id"] = $idItemTransacao;
                } else {
                    $return["SQL"] = $sql;
                    $return["Error"] = 'Erro sql';
                }
            } catch (mysqli_sql_exception $e) {
                $return["SQL"] = $sql;
                $return["Error"] = $e->errorMessage();
            }
            return $return;
        }else{
            return false;
        }
    }

}
