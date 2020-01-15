<?php
namespace App\Controller;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassTransacao;

class ControllerTransacao extends ClassTransacao {


    protected $id;
    protected $data;
    protected $entrada_saida;
    protected $idAgenda;
    protected $idCli;
    protected $nome;
    protected $idColab;
    protected $valor;
    protected $descTransacao;

    
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $Render = new ClassRender();
            $Render->setTitle("Transaões");
            $Render->setDescription("Controle da Transações");
            $Render->setKeywords("Transação");
            $Render->setDir("transacao");
            $Render->renderLayout();
        }
    }
    
    public function recVariaveis()
    {
        if(isset($_POST["id"])){
            $this->id= filter_input(INPUT_POST,'id', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["data"])){
           $this->data= filter_input(INPUT_POST,'data', FILTER_SANITIZE_SPECIAL_CHARS);
        }else {
            $this->data=null;
        }
        if(isset($_POST["entrada_saida"])){
            $this->entrada_saida= filter_input(INPUT_POST,'entrada_saida', FILTER_SANITIZE_SPECIAL_CHARS);
         }else {
             $this->entrada_saida="";
         }
         if(isset($_POST["idAgenda"])){
            $this->idAgenda= filter_input(INPUT_POST,'idAgenda', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["idCli"])){
            $this->idCli= filter_input(INPUT_POST,'idCli', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["nome"])){
            $this->nome= filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
         }else {
             $this->nome="";
         }
        if(isset($_POST["idColab"])){
            $this->idColab= filter_input(INPUT_POST,'idColab', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["valor"])){
            $this->valor= filter_input(INPUT_POST,'valor', FILTER_SANITIZE_SPECIAL_CHARS);
        }else {
            $this->valor=0;
        }
        if(isset($_POST["descTransacao"])){
            $this->descTransacao= filter_input(INPUT_POST,'descTransacao', FILTER_SANITIZE_SPECIAL_CHARS);
        }else {
             $this->descTransacao="";
        }
        if(isset($_POST["operacao"])){
            $this->operacao= filter_input(INPUT_POST,'operacao', FILTER_SANITIZE_SPECIAL_CHARS);
        }else {
            $this->operacao="";
        }
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
            if ($this->id = $this->addTransacao($this->data,$this->entrada_saida,$this->idAgenda,$this->idCli,$this->nome,$this->idColab,$this->valor,$this->descTransacao)) {
                echo 'Transacao <strong>('.$this->id.')'.$this->descTransacao.' </strong> inserido com sucesso!';
            }else {
                echo 'Problema ao atualizar Transacao <strong>'.$this->descTransacao.' </strong>!';
            };
        }
        if($this->operacao == "Edit")
        {
            if($this->updTransacao($this->id,$this->data,$this->entrada_saida,$this->idAgenda,$this->idCli,$this->nome,$this->idColab,$this->valor,$this->descTransacao)) {
                echo 'Transacao <strong>('.$this->id.')'.$this->descTransacao.' </strong> Alterado com sucesso!';
            } else {
                echo 'Problema ao atualizar Transacao <strong>'.$this->descTransacao.' </strong>!';
            }
        }
    }


}