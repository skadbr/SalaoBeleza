<?php

#Arquivos diretorios raizes
$PastaInterna="SalaoBeleza/";
define ('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");
if (substr($_SERVER['DOCUMENT_ROOT'],1)=='/') {
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}$PastaInterna");
} else {
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/$PastaInterna");
}

#Diretorios especificos
define ('DIRIMG',DIRPAGE."public/img/");
define ('DIRCSS',DIRPAGE."public/css/");
define ('DIRJS',DIRPAGE."public/js/");

DEFINE('HOST',"localhost");
DEFINE('DB',"meudbmvc");
DEFINE('USER',"root");
DEFINE('PASS',"");


?>