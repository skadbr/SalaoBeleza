<?php
namespace App\Controller;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassAgenda;
use App\Model\ClassCliente;
use App\Model\ClassTransacao;

class ControllerAgenda extends ClassAgenda {

    protected $id;
    protected $title;
    protected $start;
    protected $end;
    protected $allday;
    protected $cliId;
    protected $nomeCli;
    protected $celCli;
    protected $colabId;
    protected $idItemTransacao; 
    protected $idServ;
    protected $idProdt;
    protected $valor;
    protected $descProdtServ;

    
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $Render = new ClassRender();
            $Render->setTitle("Agenda");
            $Render->setDescription("Controle da Agenda");
            $Render->setKeywords("Agenda");
            $Render->setDir("agenda");
            $Render->renderLayout();
        }
    }

    public function recVariaveis()
    {
        if(isset($_POST["id"])){
            $this->id= filter_input(INPUT_POST,'id', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["title"])){
           $this->title= filter_input(INPUT_POST,'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["start"])){
            $this->start= $_POST["start"];
         }
        if(isset($_POST["end"])){
           $this->end= $_POST["end"];
        }
        if(isset($_POST["allday"])){
            $this->allday= filter_input(INPUT_POST,'allday', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["cliId"])){
            $this->cliId= filter_input(INPUT_POST,'cliId', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["nomeCli"])){
            $this->nomeCli= filter_input(INPUT_POST,'nomeCli', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["celCli"])){
            $this->celCli= filter_input(INPUT_POST,'celCli', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["colabId"])){
            $this->colabId= filter_input(INPUT_POST,'colabId', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["idItemTransacao"])){
            $this->idItemTransacao= filter_input(INPUT_POST,'idItemTransacao', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["idAgenda"])){
            $this->idAgenda= filter_input(INPUT_POST,'idAgenda', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["idServ"])){
            $this->idServ= filter_input(INPUT_POST,'idServ', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["idProdt"])){
            $this->idProdt= filter_input(INPUT_POST,'idProdt', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["valor"])){
            $this->valor= filter_input(INPUT_POST,'valor', FILTER_SANITIZE_SPECIAL_CHARS);
         }
         if(isset($_POST["descProdtServ"])){$this->descProdtServ= filter_input(INPUT_POST,'descProdtServ', FILTER_SANITIZE_SPECIAL_CHARS);}
      }


    public function SalvaItemTransacao() {
        $this->recVariaveis();
        $transacao = new ClassTransacao();
        $retorno = $transacao->atualizaItemTransacao($this->idItemTransacao, $this->id, $this->cliId, $this->colabId, $this->idServ,$this->idProdt, $this->valor, $this->descProdtServ);
        echo json_encode($retorno);
    }

    public function listaItensAgenda() {
        $this->recVariaveis();
        $transacao = new ClassTransacao();
        echo ($transacao->listaItensAgenda($this->id));
    }

    public function ExcluiItemTransacao(){
        $this->recVariaveis();
        $transacao = new ClassTransacao();
        echo json_encode($transacao->ExcluiItemTransacao($this->idItemTransacao));
    }


    #chamar método cadastrar da ClassAgenda         
    public function cadastrar()
    {
//        header('Content-Type: application/json');
//        console.log($_POST);
        $this->recVariaveis();
        if (!is_numeric($this->cliId) || !($this->cliId > 0)) {
            $Cliente = new ClassCliente();
            $this->cliId = $Cliente->addCliente($this->nomeCli,$this->celCli,'');
        }
        if (is_numeric($this->cliId) && ($this->cliId > 0)) {
            $retorno= ($this->addAgenda($this->title,$this->start,$this->end,$this->allday,$this->cliId,$this->colabId));
            echo $retorno;
        }
    }
    
    public function atualizar()
    {
        $this->recVariaveis();
        if (is_numeric($this->cliId) && ($this->cliId > 0)) {
            $Cliente = new ClassCliente();
            $status = $Cliente->updClienteNomeCel($this->cliId,$this->nomeCli,$this->celCli);
        } else {
            $Cliente = new ClassCliente();
            $this->cliId = $Cliente->addCliente($this->nomeCli,$this->celCli,'');
        }
        $retorno = $this->atualizaEvento($this->id,$this->title,$this->start,$this->end,$this->cliId,$this->colabId);
        echo $retorno;
    }

    #chamar método excluirEvento da ClassAgenda
    public function excluirEvento()
    {
        $this->recVariaveis();
        echo($this->delEvento($this->id));
    }

    #chamar método ListaTodosEventos da ClassAgenda
    public function ListaTodosEventos()
    {
        $this->start = date("Y-m-d",strtotime(date("Y-m-d")."-90 day"));
        echo($this->listaEventos($this->start));
    }
}