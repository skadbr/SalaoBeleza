<?php
namespace Src\Interfaces;

#Interface Obriga que o sistema implemente estes metodos
interface InterfaceView{
    public function setDir($Dir);
    public function setTitle($Title);
    public function setDescription($Description);
    public function setKeywords($Keywords);
    public function renderLayout();
}