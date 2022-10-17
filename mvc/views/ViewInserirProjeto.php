<?php

function projeto($idCient){
    include("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc\models/Importacao.php");

    foreach($cientistas as $c){
        if($c->idCientista == $idCient){
            echo "
            <div class=principal>
                <form>
                    <main class=container formulario2>
                        <h1 style=margin-bottom: 20px; text-align: center;>Upload Projeto</h1>
                        <label for=responsavel>Responsavel:</label>

                        $c->nomeCientista
                        
                        <br><br>
                        <label for=inicio>Data Inicio:</label>
                        <div class=input-field>
                            <input type=date name=inicio id=inicio />
                            <div class=underline></div>
                        </div><br>

                        <label for=fim>Data Fim:</label>
                        <div class=input-field>
                            <input type=date name=fim id=fim/>
                            <div class=underline></div>
                        </div><br>

                        <label for=resumo>Resumo:</label>
                        <div class=input-field>
                            <input type=text name=resumo id=resumo placeholder=Resumo projeto/>
                            <div class=underline></div>
                        </div><br>

                        <label for=publico>Publico:</label>
                        <input type=checkbox name=publico id=publico/>
                        <br>
                        <label for=privado>Privado:</label>
                        <input type=checkbox name=privado id=privado/>

                        <br>
                
                        <input type=submit value=Cadastrar Projeto>
                            </main>
                        </form>
                    </div>";
        }
    }
}

?>