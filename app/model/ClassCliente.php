<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassCliente extends ClassConexao{
    
    private $Db;
    

    Protected function ListaCliByNome($q)
    {
        $this->Db = $this->conexaoDB();
        $sql = "select idCli, nome, celular  
                from cliente
                where nome like '%$q%'
                limit 5";
        $result = mysqli_query($this->Db,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $row_set[] = $row; 
            // $row_set[] = array('label'=>$row['nome'],'id'=>$row['idCli']);; 
        }
        if (isset($row_set)){
            echo json_encode($row_set);
        } else{
            echo '[{"idCli":"0","nome":"Não existe"}]';
        }
    }

    public function TotalClientes(){
        $this->Db = $this->conexaoDB();
        $result=$this->Db->query("SELECT count(idCli) as total from cliente");
        $data=mysqli_fetch_assoc($result);
        echo $data['total'];
    }

    Protected function ListAll()
    {
        $this->Db = $this->conexaoDB();
        $query = "select idCli, nome, celular, imagem from cliente ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE nome LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        $result = $this->Db->query($query);
        $filteredRows = $result->num_rows;
        $result->close();
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
        $query .= 'ORDER BY idCli DESC ';
        }
        if($_POST["length"] != -1)
        {
            $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }	
    
    
//       echo $query;

        $result = $this->Db->query($query);

        $totalRows = $this->Db->affected_rows;

        $dados = array();
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
//            printf ("%s (%s)\n", $row["idCli"], $row["nome"]);
            $imagem = '';
            if($row["imagem"] != '')
            {
                $imagem = '<img src="'.DIRIMG.$row["imagem"].'" class="img-thumbnail" width="50" height="50" />';
//                echo $imagem;
            }   
            else
            {
                $imagem = '';
            }
            $sub_array = array();
            $sub_array[] = $imagem;
            $sub_array[] = $row["nome"];
            $sub_array[] = $row["celular"];
            // $sub_array[] = '<button type="button" name="update" id="'.$row["idCli"].'" class="btn btn-warning btn-sm update">Atualizar</button>';
            // $sub_array[] = '<button type="button" name="delete" id="'.$row["idCli"].'" class="btn btn-danger btn-sm delete">Excluir</button>';
            // $sub_array[] =    '<i class="fas fa-edit fa-2x style='.'"color: #339af0;"'.' tip-top update" title="Editar Cliente '.$row["idCli"].'" id='.$row["idCli"].'></i>';
            // $sub_array[] =    '<i class="fas fa-edit fa-fw fa-2x  tip-top update style='.'"color:#fff;"'.' title="Editar Cliente '.$row["idCli"].'" id='.$row["idCli"].'></i>';
            // $sub_array[] =    '<i class="fas fa-edit fa-fw fa-1x  tip-top update" title="Editar Cliente '.$row["idCli"].'" id='.$row["idCli"].' style="color:blue; text-align:center;"> </i>';
            // $sub_array[] =    '<i class="fas fa-trash fa-fw fa-1x  tip-top delete" title="Excluir Cliente '.$row["idCli"].'" id='.$row["idCli"].' style="color:red; text-align:center;"> </i>';
            $sub_array[] =    '<div class="btn-group btn-group-sm" role="group"> <button type="button" name="update" id="'.$row["idCli"].'" class="btn btn-labeled btn-info btn-sm tip-top update"  title="Editar Cliente '.$row["idCli"].'">
                <span class="btn-label">
                    <i class="fas fa-edit fa-fw fa-1x "></i>
                </span>Editar
                </button>'.
                                '<button type="button" name="delete" id="'.$row["idCli"].'" class="btn btn-labeled btn-danger btn-sm tip-top delete"  title="Excluir Cliente '.$row["idCli"].'">
                <span class="btn-label">
                    <i class="fas fa-trash fa-fw fa-1x "></i>
                </span>Excluir
                </button> </div>';
            // $sub_array[] =    '<button type="button" name="delete" id="'.$row["idCli"].'" class="btn btn-labeled btn-danger btn-sm tip-top delete"  title="Excluir Cliente '.$row["idCli"].'">
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


    public function addCliente($nome,$celular,$imagem)
    {
        $this->Db = $this->conexaoDB();
        $sql = "INSERT INTO cliente(
            nome ,
            celular ,
            imagem
            )
            VALUES (
            '".$nome."',
            '".$celular."',
            '".$imagem."')";
        if (mysqli_query($this->Db,$sql)){
            return mysqli_insert_id($this->Db);
        }else{ 
            return false;
        };

    }

    public function updCliente($idCli,$nome,$celular,$imagem)
    {
        $this->Db = $this->conexaoDB();
        $sql = "UPDATE cliente
                SET nome ='".$nome."',
                    celular = '".$celular."',
                    imagem = '".$imagem."'
                WHERE idCli = ".$idCli;

        if (mysqli_query($this->Db,$sql)){
            return true;
        }else{ 
            return false;
        };

    }

    public function updClienteNomeCel($idCli,$nome,$celular)
    {
        $this->Db = $this->conexaoDB();
        $sql = "UPDATE cliente
                SET nome ='".$nome."',
                    celular = '".$celular."'
                WHERE idCli = ".$idCli;

        if (mysqli_query($this->Db,$sql)){
            return true;
        }else{ 
            return false;
        };

    }
//     public function inserir_alterar()
//     {
//         if(isset($_POST["operacao"]))
//         {
//             if($_POST["operacao"] == "Add")
//             {
// //                echo 'imagemcliente.name:'.$_FILES["imagem_cliente"]["name"];
//                 $imagem = '';
//                 if($_FILES["imagem_cliente"]["name"] != '')
//                 {
//                     $imagem = $this->upload_imagem();
//                 }

//                 $nome = $_POST["nome"];
//                 $celular = $_POST["celular"];
//                 $this->Db = $this->conexaoDB();
//                 $sql = "INSERT INTO cliente(
//                     nome ,
//                     celular ,
//                     imagem
//                     )
//                     VALUES (
//                     '".$nome."',
//                     '".$celular."',
//                     '".$imagem."')";
//                 if (mysqli_query($this->Db,$sql)){
//                     return '{"idCli:"'.mysqli_insert_id($this->Db).'"}';
//                 };
//             }
//             if($_POST["operacao"] == "Edit")
//             {
                
//                 $imagem = '';
        
//                 if($_FILES["imagem_cliente"]["name"] != '')
//                 {
//                     $imagem = $this->upload_imagem();
//                 }
//                 else
//                 {
//                     $imagem = $_POST["hidden_usuario_imagem"];
//                 }
//                 $nome = $_POST["nome"];
//                 $celular = $_POST["celular"];
//                 $idCli = $_POST["idCli"];
//                 $this->Db = $this->conexaoDB();
//                 $sql = "UPDATE cliente
//                         SET nome ='".$nome."',
//                             celular = '".$celular."',
//                             imagem = '".$imagem."'
//                         WHERE idCli = ".$idCli;

//                 if (mysqli_query($this->Db,$sql)){
//                     echo 'Cliente <strong>'.$nome.' </strong> Alterado com sucesso!';
//                 };
//             }
//         }
//     }
    
    #Busca unica
    public function busca_unica ()
    {
        // -- WHERE idCli = '".$_POST["idCli"]."' 
        $saida = array();
        $sql =  "SELECT * FROM cliente WHERE idCli = '".$_POST["idCli"]."' LIMIT 1";
        $this->Db = $this->conexaoDB();
        if ($result = $this->Db->query($sql)) {
            /* fetch object array */
            while ($linha = $result->fetch_assoc()) {
                $saida["nome"] = $linha["nome"];
                $saida["celular"] = $linha["celular"];
                if($linha["imagem"] != '')
                {
                    $saida['imagem_cliente'] = '<img src="'.DIRIMG.$linha["imagem"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_usuario_imagem" value="'.$linha["imagem"].'" />';
                }
                else
                {
                    $saida['imagem_cliente'] = '<input type="hidden" name="hidden_usuario_imagem" value="" />';
                }
            }
            /* free result set */
            $result->close();
            echo json_encode($saida);
        } else {
            echo "Erro! Não encontrou cliente: " . $Db->error;
        }
        #Fim Busca unica
    }

    #deletar cliente
    public function delete(){
        if(isset($_POST["idCli"]))
        {
            $imagem = $this->get_imagem_nome($_POST["idCli"]);
            
            if($imagem != '')
            {
                unlink(DIRREQ . 'public/img/'.$imagem);
            }

            $sql = 'DELETE FROM cliente WHERE idCli = '.$_POST["idCli"];

            if ($this->Db->query($sql) === TRUE) {
                echo 'Cliente Nr <strong>'.$_POST["idCli"].' </strong> excluido com sucesso!';
            } else {
                echo "Erro! Não conseguiu excluir cliente: " . $this->Db->error;
            }

        }
    }
    #fim deletar cliente
    
    private function get_imagem_nome($idCli)
    {
        $sql = "SELECT imagem FROM cliente WHERE idCli = '$idCli'";
        // return $sql;
        $this->Db = $this->conexaoDB();
        if ($imagens = $this->Db->query($sql)) {
            while ($linha = $imagens->fetch_assoc()) {
                return $linha["imagem"]; 
            }
        }
    }

}
