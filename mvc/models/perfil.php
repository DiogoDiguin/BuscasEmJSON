<?php
    session_start(); # Deve ser a primeira linha do arquivo
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src = "../js/index.js"></script>
    <link rel="stylesheet" href="../../publico/Css/style02.css">
    <style>
        a{
            text-decoration: none;
        }
        a:hover{
            color: #0000FF;
            text-decoration: none;
        }
    </style>
    <title>Perfil do Usuário</title>
</head>
<body>
    <div>
        <nav>
            <ul class="containermenu">
                <li><a href='BuscarCientista.php' target="_blank">Buscar Cientistas</a></li>
                <li><a href='BuscarProjeto.php' target="_blank">Buscar Projetos</a></li>
                <li><a href='projetoInserir.php' target="_blank">Inserir Projeto</a></li>
                <?php
                    echo "<li><a href='perfil.php'>Meu Perfil</a></li>";
                    $_SESSION['idCientista'];
                ?>
                <li><a href='logout.php'>Log Out</a></li>
            </ul>
        </nav>
    </div>

<?php

    include ("../../Php/Classes/ClassePerfil.php");
    //echo $_SESSION['idCientista'];
    include ("Importacao.php");

    foreach($cientistas as $c){
        if($c->idCientista == $_SESSION['idCientista']){
            /*$idCient = $_SESSION['idCientista'];*/
            
            $perfil = new perfil($_SESSION['idCientista']);
            //$perfil->setId($_SESSION['idCientista']);
            echo $perfil->getDetalhes();
        }
    }

?>

</body>
</html>