<?php
namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes{

    private $Method;
    private $Param=[];
    private $Obj;

    protected function getMethod(){return $this->Method;}
    public function setMethod($Method){return $this->Method = $Method;}
    protected function getParam(){return $this->Param;}
    public function setParam($Param){return $this->Param = $Param;}


    public function __construct()
    {
        self::addController();
    }

    private function addController()
    {
        $RotaController=$this->getRota();
        $NameS="App\\Controller\\{$RotaController}";
        $this->Obj=new $NameS;
        if(isset($this->parseUrl()[1])){
            self::addMethod();
        }
    }

    private function addMethod()
    {
        if(method_exists($this->Obj, $this->parseUrl()[1])){
            $this->setMethod("{$this->parseUrl()[1]}");
            self::addParam();
            \call_user_func_array([$this->Obj,$this->getMethod()],$this->getParam());
        }
    }

    private function addParam()
    {
        $ContArray=count($this->parseUrl());
        if($ContArray > 2) {
            foreach($this->parseUrl() as $Key => $Value){
                if($Key > 1) {
                    $this->setParam($this->Param += [$Key => $Value]);
                }
            }
        }
    }

}