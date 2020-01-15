<?php
namespace App\Controller;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerCarro{

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $Render = new ClassRender();
            $Render->setTitle("Carro");
            $Render->setDescription("Controle do Carro");
            $Render->setKeywords("Carro");
            $Render->setDir("Carro");
            $Render->renderLayout();
        }
    }

    public function valorCarro($Tipo, $Motor){

        echo "O tipo é <strong>{$Tipo}</strong> e o Motor é <strong>{$Motor}</strong>";

        if ($Tipo == 'veiculos' && $Motor == '1'){
            $Valor = '1000,00';
        }else
            if($Tipo == 'veiculos' && $Motor == '2'){
                $Valor = '2000,00';
            }else
                if($Tipo == 'caminhao' && $Motor == '1'){
                    $Valor = '5000,00';
                }else
                    if($Tipo == 'caminhao' && $Motor == '2'){
                        $Valor = '10000,00';
                    }

        echo "<br>O tipo de Carro é {$Tipo} com motor {$Motor} e o seu valor é {$Valor}";
    } 
}


