<?php
namespace Src\Classes;
use Src\Traits\TraitUrlParser;
Class ClassRoutes{
    use TraitUrlParser;
    private $Rota;
    #Método de retorno da rota
    public function getRota(){
        $Url=$this->parseUrl();
        $I=$Url[0];

        $this->Rota=array(
            ""=>"ControllerHome",
            "home"=>"ControllerHome",
            "sitemap"=>"ControllerSitemap",
            "carro"=>"ControllerCarro",
            "contato"=>"ControllerContato",
            "agenda"=>"ControllerAgenda",
            "colaborador"=>"ControllerColaborador",
            "transacao"=>"ControllerTransacao",
            "dados"=>"ControllerDados",
            "cliente"=>"ControllerCliente"
        );
        
        if(array_key_exists($I,$this->Rota)){
            if(\file_exists(DIRREQ."App/Controller/{$this->Rota[$I]}.php")){
                return $this->Rota[$I];
            }else{
                return "ControllerHome";
            };
        }else{
            echo $I;
            var_dump ($this->Rota);
            return "Controller404";
        }
    }
}