<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AjaxPHP</title>
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css" />
    <script src="./assets/js/jquery/jquery.min.js"></script>
    <script src="./assets/js/jquery/jquery.mask.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <nav class="container">
            <a class="navbar-brand" href="index.php">Inicio</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav mr-auto">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-center dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Cadastro
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?pg=cadCli">Cliente</a>
                            <a class="dropdown-item" href="#">Produto</a>
                            <a class="dropdown-item" href="#">Categoria</a>
                        </div>
                    </li>
                </ul>
                <form method="get" name="f_busca">
                    <section class="row m-0 p-0">
                        <div class="input-group">
                            <input id="txtNome" class="form-control m-0" type="text" name="txtNome" placeholder="Procurar">
                            <div class="input-group-append">
                                <button class="form-control btn btn-success m-0" type="submit" name="btnPesquisar">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </nav>
    </nav>
    <section class="container-fluid mt-5 pt-2">
        <?php
            if(isset($_GET['pg'])){
                switch($_GET['pg']){
                    case "cadCli":
                        include_once("./assets/pages/cadCli.php");
                    break;
                    default :
                        include_once("./assets/pages/home.php");
                    break;
                }
            }else{
                include_once("./assets/pages/home.php");
            }
        ?>
    </section>
    <script src="./assets/fontawesome/js/all.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/popper/popper.min.js"></script>
</body>

</html>