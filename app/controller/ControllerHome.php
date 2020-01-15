<?php
namespace App\Controller;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerHome extends ClassRender implements InterfaceView {

    public function __construct()
    {
        $this->setTitle("Pagina Inicial");
        $this->setDescription("Sistema Salão de Beleza");
        $this->setKeywords("Sistema Controle Salão");
        $this->setDir("home");
        $this->renderLayout();
    }
    public function teste()
    {
        echo "este é um teste";
    }
}