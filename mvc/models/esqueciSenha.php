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
    <title>Esqueci minha senha</title>
</head>
<body>
    <div class="principal">
        <main class="container">
            <h2>Esqueci minha senha</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="input-field">
                        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF">
                    <div class="underline"></div>
                </div>
                <div class="input-field">
                        <input type="text" name="email" id="email" placeholder="Digite seu E-mail">
                    <div class="underline"></div>
                </div>
                <br>
                <input type="submit" value="Consultar">
            </form>
            <br>
        
        <!-- </main> -->
    <!-- </div> -->

<?php
    include ("Importacao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $cpf = htmlspecialchars($_REQUEST['cpf']);
        $email=htmlspecialchars($_REQUEST['email']);

        if(empty($cpf) or empty($email)){
            echo "CPF ou Email não digitados";
            echo "</main></div>";
        }else{
            foreach ($cientistas as $c){
                if($cpf == $c->cpfCientista and $email == $c->email){
                    $_SESSION['idCientista'] = $idCient;
                    $_SESSION['nomeCientista'] = $c->nomeCientista;
                    /*echo $c->nomeCientista;*/
                    
                    header('location: esqueciSenha-Alterar.php');        
                }
            }
        }
    }

?>

</body>
</html>