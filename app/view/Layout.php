<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Sergio Kad">
         
        <base href="<?php echo DIRPAGE ?>">

        <link src="public/img/banner.jpg" rel="icon" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.ico">
        <title>Sistema Salão - Administração</title>

        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/font-awesome/css/all.css" rel="stylesheet"> <!--load all styles -->
        <link href="public/css/style.css" rel="stylesheet">


        <?php echo $this->addHead(); ?>

        <!-- precisa para quase tudo do painel-->
        <link rel="stylesheet" href="public/jquery-ui-1.12.1/jquery-ui.css">

        <script src="public/jquery-3.4.1.min.js"></script>
        <script src="public/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> 

        <script src="public/js/bootstrap.min.js"></script>

        <!-- precisa para o abrir ou fechar os submenus do  menu lateral -->
        <script src="public/js/jquery.dcjqaccordion.2.7.js"></script>
        <!-- precisa para o esconder menu lateral -->
        <script src="public/js/jquery.nicescroll.js"></script>
        <script src="public/js/scripts.js"></script>
        <script src="public/moment.min.js"></script>

    </head>

    <body>
        <section id="container">
   
            <nav class="navbar navbar-expand-lg navbar-light bg-light static-top navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="navbar-toggler-icon"></span>
                </button> <a class="navbar-brand" href="#">Gestão Salão de Beleza</a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo DIRPAGE ?>cliente">Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo DIRPAGE ?>agenda">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo DIRPAGE ?>transacao">Transação</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Tabelas</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo DIRPAGE ?>colaborador">Colaborador</a> 
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider">
                                </div> <a class="dropdown-item" href="#">Separated link</a>
                                <a class="dropdown-item" href="#">Link separado</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="text" /> 
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">
                            Search
                        </button>
                    </form>
                    <ul class="navbar-nav ml-md-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Link <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Dropdown link</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider">
                                </div> <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav>
                <!-- <ol class="breadcrumb"> -->
                    <?php $BreadCrumb = new Src\Classes\ClassBreadcrumb(); $BreadCrumb->addBreadcrumb(); ?>
                <!-- </ol> -->
            </nav>
            <!--Main(corpo variavel) start-->
            <div class="Main">
                <section id="main-content" class="merge-left">
                    <!-- <section class="wrapper"> -->
                    <div class="alert alert-info fade show" id="mainAlerta">
                    </div>
                    <?php echo $this->addMain(); ?>
                    <!-- </session> -->
                </section>
            </div>
            <header class="header fixed-button clearfix">
                <?php echo $this->addFooter(); ?>
                <!-- </div> -->
                <footer id="sticky-footer" class="py-1 bg-dark text-white-50">
                    <div class="container text-center">
                    <small>&copy; 2019 - Kadoba</small>
                    </div>
                </footer>
            </header>

            <!--Main(corpo variavel) end-->
        </section>
    </body>
</html>