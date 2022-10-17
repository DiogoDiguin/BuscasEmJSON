<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
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
    <title>Esqueci minha senha</title>
</head>
<body>
    <div class="principal">
        <main class="container">
            <h2>Esqueci minha senha</h2>
            <?php
                echo $_SESSION['nomeCientista'];
            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="input-field">
                    <input type="text" name="senha" id="senha" placeholder="Digite sua nova senha">
                    <div class="underline"></div>
                </div>
                <div class="input-field">
                    <input type="text" name="senha02" id="senha02" placeholder="Confirme sua nova senha" style="width: 100%!important">
                    <div class="underline"></div>
                </div>

                <input type="submit" value="Alterar">
            </form>
            <br>
        <!--</main>
    </div>-->

<?php

    include ("Importacao.php");
    include ("../../Php/Interfaces/Confirmacao.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $senha = htmlspecialchars($_REQUEST['senha']);
        $senha02 = htmlspecialchars($_REQUEST['senha02']);

        if(empty($senha) or empty($senha02)){
            echo "Valores não digitados";
            echo "</main></div>";
        }if(!empty($senha) and !empty($senha02)){
            if($senha == $senha02){
                /*$idCient = $_SESSION['idCientista'];*/
            
                $senha = new confirmaSenha();
                //$perfil->setId($_SESSION['idCientista']);
                echo $senha->confirma(true);
            }
        }
    }
?>

</body>
</html>