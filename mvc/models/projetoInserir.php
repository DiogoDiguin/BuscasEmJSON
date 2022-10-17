<?php
    session_start();
    include ("Importacao.php");
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
    <title>Upload de Projeto</title>
</head>
<body>
    <div>
        <nav>
            <ul class="containermenu">
                <li><a href='BuscarCientista.php' target="_blank">Buscar Cientistas</a></li>
                <li><a href='BuscarProjeto.php'>Buscar Projetos</a></li>
                <li><a href='projetoInserir.php'>Inserir Projeto</a></li>
                <?php
                    echo "<li><a href='perfil.php' target=_blank>Meu Perfil</a></li>";
                    $_SESSION['idCientista'];
                ?>
                <li><a href='logout.php'>Logout</a></li>
            </ul>
        </nav>
    </div>

<?php
    include ("Importacao.php");
    include_once ("../views/ViewInserirProjeto.php");

    projeto($_SESSION['idCientista']);
?>

</body>
</html>