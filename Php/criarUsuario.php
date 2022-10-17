<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../publico/Css/style02.css">
    <style>
        a{
            text-decoration: none;
        }
        a:hover{
            color: #0000FF;
            text-decoration: none;
        }
    </style>
    <title>Criar Usuário</title>
</head>
<body>   
    <div class="principal">
    <main class=" container formulario2">
        <form class="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h2 style=text-align: center; margin-top: 30px;>Criar Usuário</h2>
            <!--<h1>Criar Usuário</h1>-->
            <br>

            <label for="nome">Nome:</label>
            <div class="input-field">
                <input type="text" name="nome" id="nome" >
                <div class="underline"></div>
            </div><br>

            <label for="cpf">CPF:</label>
            <div class="input-field">
                <input type="text" name="cpf" id="cpf" >
                <div class="underline"></div>
            </div><br>

            <label for="snh">Senha:</label>
            <div class="input-field">
                <input type="text" name="senha" id="senha">
                <div class="underline"></div>
            </div><br>

            <label for="nascimento">Data Nascimento:</label>
            <div class="input-field">
                <input type="text" name="nascimento" id="nascimento" />
                <div class="underline"></div>
            </div><br>

            <label for="cidade">Cidade:</label>
                <div class="input-field">
                    <select name="cidade">
                        <option value="">Cidade</option>
                        <option value="Pradópolis">Pradópolis</option>
                        <option value="Ribeirão Preto">Ribeirão Preto</option>
                        <option value="Jaboticabal">Jaboticabal</option>
                        <option value="Guariba">Guariba</option>
                    </select>
                <div class="underline"></div>
            </div><br>

            <label for="telefone">Telefone para Contato:</label>
            <div class="input-field">

                <select >
                    <option value="">DDI</option>
                    <option value="+1">+1</option>
                    <option value="+55">+55</option>
                    <option value="+82">+82</option>
                    <option value="+257">+257</option>
                </select>
                
                <select >
                    <option value="">DDD</option>
                    <option value="16">16</option>
                    <option value="42">42</option>
                    <option value="68">68</option>
                    <option value="82">82</option>
                </select>

                <input type="text" name="telefone" id="telefone" />
                <div class="underline"></div>
            </div><br>

            <label for="email1">Email 01:</label>
            <div class="input-field">
                <input type="text" name="email1" id="email1" >
                <div class="underline"></div>
            </div><br>

            <label for="email2">Email 02:</label>
            <div class="input-field">
                <input type="text" name="email2" id="email2" />
                <div class="underline"></div>
            </div><br>

            <h3>Docência</h3>
            <br>
            
            <label for="titulacao">Titulação:</label>
            <div class="input-field">
                <input type="text" name="titulacao" id="titulacao" />
                <div class="underline"></div>
            </div><br>

            <label for="formacao">Formação:</label>
            <div class="input-field">
                <input type="text" name="formacao" id="formacao" />
                <div class="underline"></div>
            </div><br>

            <label for="areaAtuacao">Área de Atuação:</label>
            <div class="input-field">
                <input type="text" name="areaAtuacao" id="areaAtuacao" />
                <div class="underline"></div>
            </div><br>
            
            <h3>Social</h3>
            <br>

            <label for="lattes">Lattes:</label>
            <div class="input-field">
                <input type="text" name="lattes" id="lattes" placeholder="Link do Lattes" >
                <div class="underline"></div>
            </div><br>

            <label for="instagram">Instagram:</label>
            <div class="input-field">
                <input type="text" name="instagram" id="instagram" placeholder="Seu perfil do Instagram">
                <div class="underline"></div>
            </div><br>

            <label for="facebook">Facebook:</label>
            <div class="input-field">
                <input type="text" name="facebook" id="facebook" placeholder="Seu perfil do Facebook">
                <div class="underline"></div>
            </div><br>

            <label for="tiktok">TikTok:</label>
            <div class="input-field">
                <input type="text" name="tiktok" id="tiktok" placeholder="Seu perfil do TikTok">
                <div class="underline"></div>
            </div><br>

            <label for="linkedin">LinkedIn:</label>
            <div class="input-field">
                <input type="text" name="linkedin" id="linkedin" placeholder="Seu perfil doLinkedIn">
                <div class="underline"></div>
            </div><br>

            <label for="youtube">Youtube:</label>
            <div class="input-field">
                <input type="text" name="youtube" id="youtube" placeholder="Seu canal do Youtube"><br>
                <div class="underline"></div>
            </div><br>

            <input type="submit" class="submitButton" name="enviar" value="Criar Usuario"/>

    <!--</form>
    </main>
</div>-->

<?php

include ("../mvc/models/Importacao.php");
include ("Interfaces/Confirmacao.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = htmlspecialchars($_REQUEST['nome']);
        $cpf=htmlspecialchars($_REQUEST['cpf']);
        $nascimento=htmlspecialchars($_REQUEST['nascimento']);
        $telefone=htmlspecialchars($_REQUEST['telefone']);
        $email1=htmlspecialchars($_REQUEST['email1']);
        $email2=htmlspecialchars($_REQUEST['email2']);
        $snh=htmlspecialchars($_REQUEST['senha']);
        $titulacao=htmlspecialchars($_REQUEST['titulacao']);
        $formacao=htmlspecialchars($_REQUEST['formacao']);
        $areaAtuacao=htmlspecialchars($_REQUEST['areaAtuacao']);
        $lattes=htmlspecialchars($_REQUEST['lattes']);
        $instagram=htmlspecialchars($_REQUEST['instagram']);
        $facebook=htmlspecialchars($_REQUEST['facebook']);
        $tiktok=htmlspecialchars($_REQUEST['tiktok']);
        $linkedin=htmlspecialchars($_REQUEST['linkedin']);
        $youtube=htmlspecialchars($_REQUEST['youtube']);
        $cidade=htmlspecialchars($_REQUEST['cidade']);

        if(!empty($nome) /*and !empty($cpf) and !empty($email1) and !empty($lattes) and !empty($snh)*/){
            
            $usuario = new confirmaUsuario();
            
            echo $usuario->confirma(true);
        }

    }
?>
</body>
</html>