<?php
namespace App\Controller;

class ControllerSitemap
{
    public function testeMetodo($Par1, $Par2, $Par3) #Tem que receber 3 parametros, senão dá pau!!
    {
        echo "O parametro 1 é <strong>{$Par1}</strong>, o parametro 2 é <strong>{$Par2}</strong>, o parametro 3 é <strong>{$Par3}</strong>,";
    }

    public function teste2()
    {
        echo "este é o teste 2";
    }
}