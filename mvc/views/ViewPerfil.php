<?php
    function perfil($idCient){

        include("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc\models/Importacao.php");
        $whatsapp = "http://api.whatsapp.com/send?1=pt_BR&phone=55";

        echo "
        <div class=principal>
            <main class=container formulario2>";

            foreach ($cientistas as $c){
                if($c->idCientista == $idCient){
                    echo "<h2 style=text-align: center; margin-top: 30px;>$c->nomeCientista</h2>
                    <form>
                        <label for=data>Data de Nascimento:</label>
                        <div class=input-field>
                            <input type=text name=data id=data value=$c->dataNascCientista>
                            <div class=underline></div>
                        </div><br>

                        <label for=email>E-mail 01:</label>
                        <div class=input-field>
                            <input type=text name=cpf id=cpf value=$c->email>
                            <div class=underline></div>
                        </div><br>

                        <label for=email02>E-mail 02:</label>
                        <div class=input-field>
                            <input type=text name=cpf id=cpf value=$c->emailAlternativo>
                            <div class=underline></div>
                        </div><br>

                        <label for=lattes>Lattes:</label>
                        <div class=input-field>
                            <input type=text name=lattes id=lattes value=$c->lattes>
                            <div class=underline></div>
                        </div><br>
                        
                        <h3 style=text-align: center; margin-top: 30px;>Telefones</h3><br>";
                }
            };

        foreach($telefones as $t){
            if($t->idCientista == $idCient){
                echo"
                <div class=input-field>
                <input type=text name=telefone value=$t->numero>
                <div class=underline></div>
                </div><br>"
                ;
            }
        }

        echo "<h3 style=text-align: center; margin-top: 30px;>Formações</h3><br>";
        foreach($formacao as $f){
            if($f->idCientista == $idCient){
                foreach($titulacao as $tit){
                    if($tit->idTitulacao == $f->idTitulacao) {
                        echo"
                            <div class=input-field>
                            <input type=text name=nomeTitulacao value=$tit->nomeTitulacao>
                            <input type=text name=dtiFormacao value=$f->dtiFormacao>
                            <input type=text name=dtfFormacao value=$f->dtfFormacao>
                            <div class=underline></div>
                            </div><br>
                            </form>"
                        ;
                    }
                }
            }
        }

        echo "<h3 style=text-align: center; margin-top: 30px;>Areas de atuação:</h3><br>";
            foreach ($areaAtuacaoCientista as $aC){
                if($aC->idCientista == $idCient){
                    foreach($areaAtuacao as $aAt){
                        if($aC->idAreaAtuacao == $aAt->idAreaAtuacao) {
                            echo"
                            <div class=input-field>
                            <input type=text name=nomeAreaAtuacao value=$aAt->nomeAreaAtuacao>
                            <div class=underline></div>
                            </div><br>
                            </form>";
                        }
                    }
                }
            }

            echo "<br>";

            foreach ($redesSociais as $r){
                if($idCient == $r->idCientista){/*Instagram*/
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

        echo "<br><br><h3 style=text-align: center; margin-top: 30px;>Projetos</h3><br>";

        foreach($projetos as $p){
            if($p->idCientistaProjeto == $idCient and $p->publiProjeto == true){
                echo "<Strong> $p->titProjeto </Strong><br>";
                echo $p->resProjeto."<br>";
                echo $p->dti_Projeto." - ".$p->dtt_Projeto;
            }
        }
        echo "</main>";
    }
?>