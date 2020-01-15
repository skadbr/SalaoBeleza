<?php
namespace App\Controller;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassColaborador;

class ControllerColaborador extends ClassColaborador {

    protected $idColab;
    protected $nome;
    protected $celular;
    protected $imagem;

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $Render = new ClassRender();
            $Render->setTitle("Colaborador");
            $Render->setDescription("Controle do Colaborador");
            $Render->setKeywords("Colaborador");
            $Render->setDir("colaborador");
            $Render->renderLayout();
        }
    }

    public function recVariaveis()
    {
        if(isset($_POST["idColab"])){
            $this->idColab= filter_input(INPUT_POST,'idColab', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST["nome"])){
           $this->nome= filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        }else{
            $this->nome="";
        }
      }

    #lista Colab pelo parte do nome
    public function AutoComplete()
    {
 //       $this->recVariaveis();
        // $this->$nome = $_GET["nome"];
        // echo 'nome é:'.$this->$nome;
        echo($this->ListaColabByNome($_GET["nome"]));
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

}