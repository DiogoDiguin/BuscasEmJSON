<?php
    session_start(); # Deve ser a primeira linha do arquivo
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Projetos</title>
    <link rel="stylesheet" type="text/css" href="../../publico/Css/style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>

    <div>
        <nav>
            <ul class="containermenu">
                <li><a href='BuscarCientista.php' target="_blank">Buscar Cientistas</a></li>
                <li><a href='BuscarProjeto.php'>Buscar Projetos</a></li>
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
    <main class="container formulario2">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <!-- Para o usuário manipular -->
            <h2 style=text-align: center; margin-top: 30px;>Buscar Projetos</h2>
        <br>
            <div class="input-field">
                <input type="text" name="nProjeto" placeholder="Nome do projeto">
                <div class="underline"></div>
            </div>
        <br>
            <div class="input-field">
                <input type="text" name="nProjetoEspecifico" placeholder="Nome do projeto COMPLETO">
                <div class="underline"></div>
            </div>
        <br>
            <div class="input-field">
                <input type="text" name="nResponsavel" placeholder="Nome do responsável">
                <div class="underline"></div>
            </div>
        <br>
            <input type="submit" value="OK">
        </form>
    </main>
    </div>
    
<?php
    //echo '<prev>';
    //$busca = $_POST['palavra'];

    include ("Importacao.php");
    include_once ("../views/ViewBuscaProjeto.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $buscaPr = htmlspecialchars($_REQUEST['nProjeto']);
        $buscaPrEspc = htmlspecialchars($_REQUEST['nProjetoEspecifico']);
        $buscaCient = htmlspecialchars($_REQUEST['nResponsavel']);

        if(!empty($buscaPr)){
            foreach ($projetos as $p){
                if(str_contains(strtoupper($p->titProjeto), strtoupper($buscaPr))
                and $p->publiProjeto <> false){

                    $idCient = $p->idCientistaProjeto;
                    $titulo = $p->titProjeto;

                    include ("Importacao.php");

                    /*$resumo = $p->resProjeto;
                    $dataInicio = $p->dti_Projeto;
                    $dataFim = $p->dtt_Projeto;*/

                    projeto($idCient, $titulo);   
                }
            }
        }else if(!empty($buscaCient)){
            foreach($cientistas as $c){
                foreach($projetos as $p){
                    if(str_contains(strtoupper($c->nomeCientista), strtoupper($buscaCient))
                    and $c->idCientista == $p->idCientistaProjeto and $p->publiProjeto <> false){

                        $idCient = $p->idCientistaProjeto;
                        $titulo = $p->titProjeto;
        
                        include ("Importacao.php");

                        projeto($idCient, $titulo);   
                    }
                }
            }
        }else if(!empty($buscaPrEspc)){
            foreach ($projetos as $p){
                if($p->titProjeto == $buscaPrEspc and $p->publiProjeto <> false){
                    $idCient = $p->idCientistaProjeto;
                    $titulo = $p->titProjeto;

                    include_once ("../../Php/Classes/ClasseExibirProjetos.php");
                    //include ("../mvc/models/Importacao.php");

                    $exibirProjetos = new exibirProjetos();
                    echo $exibirProjetos->setDetalhes($idCient, $titulo);
                    echo $exibirProjetos->getDetalhes();
                }
            }
        }else if(empty($buscaPr) and empty($buscaCient) and empty($buscaPrEspc)){
            foreach($projetos as $p){
                include ("Importacao.php");
                /*include ("../mvc/views/ViewBuscaProjeto.php");*/
                $idCient = $p->idCientistaProjeto;
                $titulo = $p->titProjeto;

                projeto($idCient, $titulo);  
            }
        }
    }
?>

</body>
</html>