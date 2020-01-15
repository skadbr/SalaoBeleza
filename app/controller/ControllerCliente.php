<?php
namespace App\Controller;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassCliente;

class ControllerCliente extends ClassCliente {

    protected $idCli;
    protected $nome;
    protected $celular;
    protected $imagem;
    protected $operacao;
    
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $Render = new ClassRender();
            $Render->setTitle("Cliente");
            $Render->setDescription("Controle do Cliente");
            $Render->setKeywords("Cliente");
            $Render->setDir("cliente");
            $Render->renderLayout();
        }
    }

    public function recVariaveis()
    {
        if(isset($_POST["idCli"])){
            $this->idCli= filter_input(INPUT_POST,'idCli', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["nome"])){
           $this->nome= filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        }else {
            $this->nome="";
        }
        if(isset($_POST["celular"])){
            $this->celular= filter_input(INPUT_POST,'celular', FILTER_SANITIZE_SPECIAL_CHARS);
         }else {
             $this->celular="";
         }
         if(isset($_POST["operacao"])){
            $this->operacao= filter_input(INPUT_POST,'operacao', FILTER_SANITIZE_SPECIAL_CHARS);
        }else {
            $this->operacao="";
        }

        if($_FILES["imagem_cliente"]["name"] != '')
        {
            $this->imagem = $this->upload_imagem();
        }else {
            $this->imagem="";
        }
   
    }

    private function upload_imagem(){
        if(isset($_FILES["imagem_cliente"]))
        {
            $extensao = explode('.', $_FILES['imagem_cliente']['name']);
            // $novo_nome = rand() . '.' . $extensao[1];
            // $today = date("Y-m-d-H-i-s");
            $novo_nome = date("Y-m-d-H-i-s") . '.' . $extensao[count($extensao)-1];
            $destino = DIRREQ.'public/img/' . $novo_nome;
            move_uploaded_file($_FILES['imagem_cliente']['tmp_name'], $destino);
            return $novo_nome;
        }
    }



    public function AutoComplete() 
    {
 //       $this->recVariaveis();
        // $this->$nome = $_GET["nome"];
        // echo 'nome é:'.$this->$nome;
        echo($this->ListaCliByNome($_GET["nome"]));
    }
   
    public function buscar()
    {
        // $search = array();
        // $order = array();
        // $length = array();
        // $start = array();
        // $draw = array();
//    echo "<pre>"; print_r($_REQUEST); echo "</pre>";
        // if(isset($_POST["search"])) {$searchValue = $_POST["search"]["value"];}
        // if(isset($_POST['order']['0']['column'])) {$orderColumn = $_POST['order']['0']['column'];}
        // if(isset(['order']['0']['dir'])) {$orderDir = $_POST['order']['0']['dir'];}
        // if(isset($_POST['start'])) {$start= $_POST['start'];}	
        // if(isset($_POST["length"])) {$length= $_POST["length"];}	
        // if(isset($_POST["draw"])) {$draw = $_POST["draw"];}	
        
//        $retorno = $this->ListAll($_POST["search"], $_POST['order'], $_POST['start'], $_POST["length"],$_POST["draw"]);
        $retorno = $this->ListAll();
        echo $retorno;
    }


    public function inserir_alterar()
    {
        $this->recVariaveis();

        if($this->operacao == "Add")
        {
            if ($this->idCli = $this->addCliente($this->nome,$this->celular,$this->imagem)) {
                echo 'Cliente <strong>('.$this->idCli.')'.$this->nome.' </strong> inserido com sucesso!';
            }else {
                echo 'Problema ao atualizar Cliente <strong>'.$nome.' </strong>!';
            };
        }
        if($this->operacao == "Edit")
        {
            if($this->updCliente($this->idCli,$this->nome,$this->celular,$this->imagem)) {
                echo 'Cliente <strong>('.$this->idCli.')'.$this->nome.' </strong> Alterado com sucesso!';
            } else {
                echo 'Problema ao atualizar Cliente <strong>'.$this->nome.' </strong>!';
            }
        }
    }


}