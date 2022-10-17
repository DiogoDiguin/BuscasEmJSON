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
    <link rel="stylesheet" href="Css/style03.css">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <h2>Login</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="input-field">
                <div class="error" id="usuario-required-error">Usuário é OBRIGATÓRIO</div>
                <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <div class="error" id="usuario-required-error2">Senha é OBRIGATÓRIA</div>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                <div class="underline"></div>
            </div>
            <input type="submit" value="Continue">
        </form>
        <br>
        <a href="../Php/criarUsuario.php" target="_blank">Criar cadastro</a>
        <br>
        <a href="../mvc/models/esqueciSenha.php" target="_blank">Esqueci minha Senha</a>
        <style>
            a{
                text-decoration: none;
            }
            a:hover{
                color: #0000FF;
                text-decoration: none;
            }
        </style>
    </main>
</body>

<?php

    include ("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc\models/Importacao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $Cpf = htmlspecialchars($_REQUEST['cpf']);
        $senha = htmlspecialchars($_REQUEST['senha']);

        if(!empty($Cpf) and !empty($senha)){
            foreach ($cientistas as $c){
                if($c->cpfCientista == $Cpf and $c->snhCientista == $senha){
                    $idCient = $c->idCientista;
                    $_SESSION['idCientista'] = $idCient;

                    header('Location: ../mvc/models/perfil.php');    
                }
            }
        }
    }
?>
</html>