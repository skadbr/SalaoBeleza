<?php
namespace Src\Classes;

class ClassBreadcrumb
{
    use \Src\Traits\TraitUrlParser;

    public function addBreadcrumb()
    {
        $Contador=count($this->parseUrl());
        
        $ArrayLink[0]='';
        
        echo "<a href=".DIRPAGE.">home</a>";

        
        for ($I=0; $I < $Contador; $I++) {
//            echo "<br>".$I."=".$this->parseUrl()[$I];
             if($I<1) {
                $ArrayLink[0] = $ArrayLink[0].$this->parseUrl()[$I];
             }else {
                $ArrayLink[0] = $ArrayLink[0]."/".$this->parseUrl()[$I];
             }
             echo " > <a href=".DIRPAGE.$ArrayLink[0].">".$this->parseUrl()[$I]."</a>";

        }
    }
}
