<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassColaborador extends ClassConexao{
    
    private $Db;
    

    Protected function ListaColabByNome($q)
    {
        $this->Db = $this->conexaoDB();
        $sql = "select idColab, nome 
                from colaborador
                where nome like '%$q%'
                limit 5";
        $result = mysqli_query($this->Db,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $row_set[] = $row; 
            // $row_set[] = array('label'=>$row['nome'],'id'=>$row['idColab']);; 
        }
        if (isset($row_set)){
            echo json_encode($row_set);
        } else{
            echo '[{"idColab":"0","nome":"Não existe"}]';
        }

    }

    public function TotalColaboradores(){
        $this->Db = $this->conexaoDB();
        $result=$this->Db->query("SELECT count(idColab) as total from colaborador");
        $data=mysqli_fetch_assoc($result);
        echo $data['total'];
    }

    public function ListColab(){
        $this->Db = $this->conexaoDB();
        $result=$this->Db->query("SELECT idColab,nome from colaborador");
        while($row = mysqli_fetch_assoc($result))
        {
            $row_set[] = $row; 
            // $row_set[] = array('label'=>$row['nome'],'id'=>$row['idColab']);; 
        }
        if (isset($row_set)){
            return($row_set);
        }
        return(false);

    }

    Protected function ListAll()
    {
        $this->Db = $this->conexaoDB();
        $query = "select idColab, nome, celular, imagem from colaborador ";
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
        $query .= 'ORDER BY idColab DESC ';
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
//            printf ("%s (%s)\n", $row["idColab"], $row["nome"]);
            $imagem = '';
            if($row["imagem"] != '')
            {
                $imagem = '<img src="'.DIRIMG.$row["imagem"].'" class="img-thumbnail" width="50" height="35" />';
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
            $sub_array[] = '<button type="button" name="update" id="'.$row["idColab"].'" class="btn btn-warning btn-sm update">Atualizar</button>';
            $sub_array[] = '<button type="button" name="delete" id="'.$row["idColab"].'" class="btn btn-danger btn-sm delete">Excluir</button>';
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

    private function upload_imagem(){
        if(isset($_FILES["imagem_colaborador"]))
        {
            $extensao = explode('.', $_FILES['imagem_colaborador']['name']);
            // $novo_nome = rand() . '.' . $extensao[1];
            // $today = date("Y-m-d-H-i-s");
            $novo_nome = date("Y-m-d-H-i-s") . '.' . $extensao[count($extensao)-1];
            $destino = DIRREQ.'public/img/' . $novo_nome;
            move_uploaded_file($_FILES['imagem_colaborador']['tmp_name'], $destino);
            return $novo_nome;
        }
    }


    public function inserir_alterar()
    {
        if(isset($_POST["operacao"]))
        {
            if($_POST["operacao"] == "Add")
            {
//                echo 'imagemcolaborador.name:'.$_FILES["imagem_colaborador"]["name"];
                $imagem = '';
                if($_FILES["imagem_colaborador"]["name"] != '')
                {
                    $imagem = $this->upload_imagem();
                }

                $nome = $_POST["nome"];
                $celular = $_POST["celular"];
                $this->Db = $this->conexaoDB();
                $sql = "INSERT INTO colaborador(
                    nome ,
                    celular ,
                    imagem
                    )
                    VALUES (
                    '".$nome."',
                    '".$celular."',
                    '".$imagem."')";
                if (mysqli_query($this->Db,$sql)){
                    echo "Colaborador <strong>$nome </strong>salvo com sucesso !";
                };
            }
            if($_POST["operacao"] == "Edit")
            {
                
                $imagem = '';
        
                if($_FILES["imagem_colaborador"]["name"] != '')
                {
                    $imagem = $this->upload_imagem();
                }
                else
                {
                    $imagem = $_POST["hidden_usuario_imagem"];
                }
                $nome = $_POST["nome"];
                $celular = $_POST["celular"];
                $idColab = $_POST["idColab"];
                $this->Db = $this->conexaoDB();
                $sql = "UPDATE colaborador
                        SET nome ='".$nome."',
                            celular = '".$celular."',
                            imagem = '".$imagem."'
                        WHERE idColab = ".$idColab;

                if (mysqli_query($this->Db,$sql)){
                    echo "Colaborador <strong>$nome</strong> atualizado com sucesso !";
                };
            }
        }
    }
    
    #Busca unica
    public function busca_unica ()
    {
        // -- WHERE idColab = '".$_POST["idColab"]."' 
        $saida = array();
        $sql =  "SELECT * FROM colaborador WHERE idColab = '".$_POST["idColab"]."' LIMIT 1";
        $this->Db = $this->conexaoDB();
        if ($result = $this->Db->query($sql)) {
            /* fetch object array */
            while ($linha = $result->fetch_assoc()) {
                $saida["nome"] = $linha["nome"];
                $saida["celular"] = $linha["celular"];
                if($linha["imagem"] != '')
                {
                    $saida['imagem_colaborador'] = '<img src="'.DIRIMG.$linha["imagem"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_usuario_imagem" value="'.$linha["imagem"].'" />';
                }
                else
                {
                    $saida['imagem_colaborador'] = '<input type="hidden" name="hidden_usuario_imagem" value="" />';
                }
            }
            /* free result set */
            $result->close();
            echo json_encode($saida);
        } else {
            echo "Erro! Não encontrou colaborador: " . $Db->error;
        }
        #Fim Busca unica
    }

    #deletar colaborador
    public function delete(){
        if(isset($_POST["idColab"]))
        {
            $imagem = $this->get_imagem_nome($_POST["idColab"]);
            
            if($imagem != '')
            {
                unlink(DIRREQ . 'public/img/'.$imagem);
            }

            $sql = 'DELETE FROM colaborador WHERE idColab = '.$_POST["idColab"];

            if ($this->Db->query($sql) === TRUE) {
                echo "Colaborador <strong>Nr. ".$_POST["idColab"]."</strong> excluido com sucesso !";
            } else {
                echo "Erro! Não conseguiu excluir colaborador: " . $this->Db->error;
            }

        }
    }
    #fim deletar colaborador
    
    private function get_imagem_nome($idColab)
    {
        $sql = "SELECT imagem FROM colaborador WHERE idColab = '$idColab'";
        // return $sql;
        $this->Db = $this->conexaoDB();
        if ($imagens = $this->Db->query($sql)) {
            while ($linha = $imagens->fetch_assoc()) {
                return $linha["imagem"]; 
            }
        }
    }


}

