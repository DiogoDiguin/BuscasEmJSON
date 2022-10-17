<?php

    /*Escrita dos projetos*/
    function projeto($idCient, $titulo){

        include("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc\models/Importacao.php");
        /*include ("../mvc/models/Importacao.php");*/

        $whatsapp = "http://api.whatsapp.com/send?1=pt_BR&phone=55";

        foreach($projetos as $p){
            if($idCient == $p->idCientistaProjeto and 
            str_contains(strtoupper($p->titProjeto), strtoupper($titulo))){
                echo "
                <p class=container>
                    <strong>$p->titProjeto</strong><br>
                    
                    <br>$p->resProjeto<br>
                    <strong><br>Data Início: </strong> $p->dti_Projeto - 
                    <strong> Data Fim: </strong>$p->dtt_Projeto
                    <br>
                ";

                foreach ($cientistas as $c){
                    if($idCient == $c->idCientista){
                        echo "<br><strong> Responsável: </strong>$c->nomeCientista <br>";
                        foreach ($telefones as $t){
                            if($idCient == $t->idCientista){
                                echo"<br><strong> Telefone: </strong>"."(".$t->ddd.") "."$t->numero <a href=$whatsapp$t->ddd$t->numero target=_blank><img src=../../Imagens/whatsapp.svg alt=Whatsapp Logo
                                width=25px heigth=25px/></a>";
                            }
                        }
                    }
                }
            }
        }
        

        echo "</p>";
    }
    /*FIM - Escrita dos projetos*/

?>