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
    <title>Perfil</title>
</head>
<body>
    <div>
        <nav>
            <ul class="containermenu">
                <li><a href='BuscarCientista.php' target="_blank">Buscar Cientistas</a></li>
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
    

<?php
    include ("../mvc/models/Importacao.php");
    $whatsapp = "http://api.whatsapp.com/send?1=pt_BR&phone=55";

    foreach($cientistas as $c){
        if($c->idCientista == $_SESSION['idPerfil']){
            echo "
                <div class=principal>
                    <main class=container formulario2>
                    
                    <h2 style=text-align: center; margin-top: 30px;>$c->nomeCientista</h2>
                    <h3 style=text-align: center; margin-top: 30px;>Social</h3>";

                    foreach ($redesSociais as $r){
                        if($_SESSION['perfil'] == $r->idCientista){/*Instagram*/
                            if(str_contains($r->enderecoSocial, "www.instagram")){
                                echo "<a href=$r->enderecoSocial target=_blank><img src=../Imagens/instagram.svg alt=Instagram Logo
                                width=25px heigth=25px></a> ";
                            }
                            if(str_contains($r->enderecoSocial, "www.facebook")){/*Facebook*/
                                echo "<a href=$r->enderecoSocial target=_blank><img src=../Imagens/facebook.svg alt=Facebook Logo
                                width=25px heigth=25px></a> ";
                            }
                            if(str_contains($r->enderecoSocial, "www.linkedin")){/*Linkedin*/
                                echo "<a href=$r->enderecoSocial target=_blank><img src=../Imagens/linkedin.svg alt=Linkedin Logo
                                width=25px heigth=25px></a> ";
                            }
                            if(str_contains($r->enderecoSocial, "www.youtube")){/*Youtube*/
                                echo "<a href=$r->enderecoSocial target=_blank><img src=../Imagens/youtube.svg alt=Youtube Logo
                                width=25px heigth=25px></a> ";
                            }
                            if(str_contains($r->enderecoSocial, "www.tiktok")){/*Tiktok*/
                                echo "<a href=$r->enderecoSocial target=_blank><img src=../Imagens/tiktok.svg alt=Tiktok Logo
                                width=25px heigth=25px></a> ";
                            }
                        }
                    }
            echo"
                <br><br><label for=data>Data de Nascimento:</label>
                $c->dataNascCientista
                <br><label for=data>Email:</label>
                $c->email
                <br><label for=data>Email 02:</label>
                $c->emailAlternativo
                <br><label for=data>Lattes:</label>
                <a href=$c->lattes target=_blank>$c->lattes</a><br>";

                foreach($telefones as $t){
                    if($t->idCientista == $_SESSION['idPerfil']){
                        echo"
                        ("."$t->ddd".")"." $t->numero <a href=$whatsapp$t->ddd$t->numero target=_blank><img src=../Imagens/whatsapp.svg alt=Whatsapp Logo
                        width=25px heigth=25px/></a><br>
                        ";
                    }
                }

                echo "<br><h3 style=text-align: center; margin-top: 30px;>Formações</h3>";
                foreach($formacao as $f){
                    if($f->idCientista == $_SESSION['idPerfil']){
                        foreach($titulacao as $tit){
                            if($tit->idTitulacao == $f->idTitulacao) {
                                echo"
                                    $tit->nomeTitulacao: 
                                    $f->dtiFormacao a 
                                    $f->dtfFormacao
                                    <br>";
                            }
                        }
                    }
                }

                echo "<br><h3 style=text-align: center; margin-top: 30px;>Areas de atuação:</h3>";
                    foreach ($areaAtuacaoCientista as $aC){
                        if($aC->idCientista == $_SESSION['idPerfil']){
                            foreach($areaAtuacao as $aAt){
                                if($aC->idAreaAtuacao == $aAt->idAreaAtuacao) {
                                    echo $aAt->nomeAreaAtuacao;
                                }
                            }
                        }
                    }

                echo "<br><br><h3 style=text-align: center; margin-top: 30px;>Projetos</h3><br>";

                foreach($projetos as $p){
                    if($p->idCientistaProjeto == $_SESSION['idPerfil'] and $p->publiProjeto == true){
                        echo "<Strong> $p->titProjeto </Strong><br>";
                        echo $p->resProjeto."<br>";
                        echo $p->dti_Projeto." - ".$p->dtt_Projeto."<br><br>";
                    }
                }
                echo "</main>";
        }
    }
?>
</body>
</html>