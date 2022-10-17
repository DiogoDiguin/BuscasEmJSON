<?php
    session_start(); # Deve ser a primeira linha do arquivo
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Cientistas</title>
    <link rel="stylesheet" type="text/css" href="../../publico/Css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <nav>
            <ul class="containermenu">
            <li><a href='BuscarCientista.php'>Buscar Cientistas</a></li>
            <li><a href='BuscarProjeto.php' target="_blank">Buscar Projetos</a></li>
            <li><a href='projetoInserir.php' target="_blank">Inserir Projeto</a></li>
            <?php
                    echo "<li><a href='perfil.php' target=_blank>Meu Perfil</a></li>";
                    $_SESSION['idCientista'];
            ?>
            <li><a href='logout.php'>Log Out</a></li>
            </ul>
        </nav>
    </div>

    <div class="principal">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <main class="container formulario2">
            <!-- Para o usuário manipular -->
            <h2 style=text-align: center; margin-top: 30px;>Buscar Cientistas</h2>
        <br>
            <div class="input-field">
                <input type="text" name="nome" placeholder="Insira uma palavra/frase - ENTER = Todos">
                <div class="underline"></div>
            </div>
            <br>
            <div class="input-field">
                <input type="text" name="nomeEspecifico" placeholder="Sabe o Nome Completo? Digite Aqui">
                <div class="underline"></div>
            </div>
            <br>
            <label for="cidades">Escolha a cidade:</label>
            <div>
                <select name="cidades" id="cidades">
                    <option value="0">Selecione uma opção</option>
                    <option value="Ribeirão Preto">Ribeirão Preto</option>
                    <option value="Jaboticabal">Jaboticabal</option>
                    <option value="Pradópolis">Pradópolis</option>
                    <option value="Guariba">Guariba</option>
                </select>
            </div>
            <br>
            <input type="submit" value="OK">
            </main>
        </form>
    </div>
    
<?php
    /*echo '<prev>';
    $busca = $_POST['palavra'];

    $busca="";
    $buscaCidade="";*/

    /*
    Contagem de Registros
    $dados = json_decode($dadosJsonCient,true);
    $total = 0;
    foreach ($dados["cientistas"] as $value) {
        if($value["idCientista"]<>""){
            $total = $total+1;
        }
    }
    //echo $total;
    */

    include ("Importacao.php");
    include_once ("../views/ViewBuscaCientista.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $busca = htmlspecialchars($_REQUEST['nome']);
        $buscaEspec=htmlspecialchars($_REQUEST['nomeEspecifico']);
        $buscaCidade=htmlspecialchars($_REQUEST['cidades']);
        $todos = "todos";

        if(!empty($busca)){
            foreach ($cientistas as $c){
                if(str_contains(strtoupper($c->nomeCientista), strtoupper($busca))){

                    $id = $c->idCientista;
                    include ("Importacao.php");

                    /*$nome = $c->nomeCientista;
                    $dataNasc = $c->dataNascCientista;
                    $cidade = $c->cidadeCientista;
                    $cpf = $c->cpfCientista;
                    $email = $c->email;
                    $email_02 = $c->emailAlternativo;
                    $lattes = $c->lattes;*/

                    cientistas($id); 
                }
            }
        }else if(!empty($buscaCidade)){
            foreach ($cientistas as $c){
                if($buscaCidade==$c->cidadeCientista){

                    $id = $c->idCientista;
                    include ("Importacao.php");

                    cientistas($id); 
                }
            }
        }else if(!empty($buscaCidade) and !empty($busca)){
            foreach ($cientistas as $c){
                if((str_contains(strtoupper($c->nomeCientista), strtoupper($busca))) 
                and ($buscaCidade==$c->cidadeCientista)){

                    $id = $c->idCientista;
                    include ("Importacao.php");

                    cientistas($id);  
                }
            }
        }else if(!empty($buscaEspec)){
            foreach ($cientistas as $c){
                if($buscaEspec==$c->nomeCientista){

                    $id = $c->idCientista;
                    include_once ("../../Php/Classes/ClasseExibirCientistas.php");
                    include ("Importacao.php");

                    $exibirCientista = new exibirCientista();
                    echo $exibirCientista->setId($id);
                    echo $exibirCientista->getDetalhes(); 
                }
            }
        }else{
            foreach ($cientistas as $c){

                $id = $c->idCientista;
                include ("Importacao.php");

                cientistas($id); 
            }
        }
    }
?>

</body>
</html>