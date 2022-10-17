<?php /*Escrita dos perfis dos cientistas*/
    function cientistas($id){

        include("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc\models/Importacao.php");
        /*include ("../mvc/models/Importacao.php");*/

        $whatsapp = "http://api.whatsapp.com/send?1=pt_BR&phone=55";

        echo "
        <p class=container>";
        foreach ($cientistas as $c){
            if($c->idCientista == $id){
                echo "<strong>$c->nomeCientista</strong><br>";
                echo "<br><strong> Data Nasc.: </strong>$c->dataNascCientista
                <br><strong> Cidade: </strong>$c->cidadeCientista
                <br><strong> Cpf: </strong>$c->cpfCientista
                <br><strong> Email: </strong><a href=mailto:$c->email> $c->email </a>
                <br><strong> Email 02: </strong><a href=mailto:$c->emailAlternativo> $c->emailAlternativo </a>
                <br><strong> </strong><a href=$c->lattes>Lattes</a>
                <br>";
            }
        }

        echo "<strong><br>Formações: </strong><br>";
            foreach ($formacao as $for){
                if($id == $for->idCientista){
                    foreach($titulacao as $tit){
                        if($tit->idTitulacao == $for->idTitulacao) {
                            echo $tit->nomeTitulacao;
                            echo " - <strong>Início: </strong>".$for->dtiFormacao;
                            echo " | <strong>Fim: </strong>".$for->dtfFormacao."<br>";
                        }
                    }
                }
            }
        
        echo "<strong><br>Áreas Atuação: </strong><br>";
            foreach ($areaAtuacaoCientista as $aC){
                if($aC->idCientista == $id){
                    foreach($areaAtuacao as $aAt){
                        if($aC->idAreaAtuacao == $aAt->idAreaAtuacao) {
                            echo $aAt->nomeAreaAtuacao."<br>";
                        }
                    }
                }
            }

        echo "<strong><br>Contato: </strong><br>";
            foreach ($telefones as $t){
                if($id == $t->idCientista){
                    echo"("."$t->ddd".")"." $t->numero <a href=$whatsapp$t->ddd$t->numero target=_blank><img src=../../Imagens/whatsapp.svg alt=Whatsapp Logo
                    width=25px heigth=25px/></a><br>";
                }
            }

        echo "<br>";
        
            foreach ($redesSociais as $r){
                if($id == $r->idCientista){/*Instagram*/
                    if(str_contains($r->enderecoSocial, "www.instagram")){
                        echo "<a href=$r->enderecoSocial target=_blank><img src=../../Imagens/instagram.svg alt=Instagram Logo
                        width=25px heigth=25px></a> ";
                    }
                    if(str_contains($r->enderecoSocial, "www.facebook")){/*Facebook*/
                        echo "<a href=$r->enderecoSocial target=_blank><img src=../../Imagens/facebook.svg alt=Facebook Logo
                        width=25px heigth=25px></a> ";
                    }
                    if(str_contains($r->enderecoSocial, "www.linkedin")){/*Linkedin*/
                        echo "<a href=$r->enderecoSocial target=_blank><img src=../../Imagens/linkedin.svg alt=Linkedin Logo
                        width=25px heigth=25px></a> ";
                    }
                    if(str_contains($r->enderecoSocial, "www.youtube")){/*Youtube*/
                        echo "<a href=$r->enderecoSocial target=_blank><img src=../../Imagens/youtube.svg alt=Youtube Logo
                        width=25px heigth=25px></a> ";
                    }
                    if(str_contains($r->enderecoSocial, "www.tiktok")){/*Tiktok*/
                        echo "<a href=$r->enderecoSocial target=_blank><img src=../../Imagens/tiktok.svg alt=Tiktok Logo
                        width=25px heigth=25px></a> ";
                    }
                }
            }


        /*echo "<a href=perfilEstatico.php target=_blank>Ver perfil</a>";
        $_SESSION['idPerfil'] = $id;
        echo $id;*/

        echo "</p><br>";
    }
    /*FIM - Escrita dos perfis dos cientistas*/
?>