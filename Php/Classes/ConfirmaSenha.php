<?php

include('C:\xampp\htdocs\diogo\BuscasEmJSON\Php\InterfacesConfirmacao.php');

class confirmaSenha implements Confirma{
    //private $valor;

    public function confirma($valor){
        if($valor == true){
            echo "SENHA ALTERADA";
        }
    }
}

?>
