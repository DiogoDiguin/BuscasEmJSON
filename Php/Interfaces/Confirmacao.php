<?php

interface Confirma{
    public function confirma($valor);
}

class confirmaSenha implements Confirma{
    //private $valor;

    public function confirma($valor){
        if($valor == true){
            echo "SENHA ALTERADA";
            echo "</main></div>";
        }
    }
}

class confirmaUsuario implements Confirma{
    //private $valor;

    public function confirma($valor){
        if($valor == true){
            echo "<br>
                USUÁRIO CRIADO";
            echo "</main></div>";
        }
    }
}

?>