<?php
namespace App\Controller;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassDados;

class ControllerDados extends ClassDados {

    protected $sql;
    
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $Render = new ClassRender();
            $Render->setTitle("Dados");
            $Render->setDescription("Controle do Dados");
            $Render->setKeywords("Dados");
            $Render->setDir("Dados");
            $Render->renderLayout();
        }
    }

    public function recVariaveis()
    {
        if(isset($_POST["sql"])){
            $this->sql= filter_input(INPUT_POST,'sql', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function returnJson()
    {
        $this->recVariaveis();
        echo $this->dadosJson($this->sql);
    }


}