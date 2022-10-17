<?php

    include("ClasseExibir.php");
    final class exibirCientista extends exibir{
        private $id;

        /*public function __construct($id){
            $this->id = $id;
        }*/

        public function getDetalhes(){
            include_once("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc/views/ViewBuscaCientista.php");
            return cientistas($this->id);
        }

        public function setDetalhes($valor1, $valor2){
            
        }

        public function setId($valor){
            $this->id = $valor;
        }
    }

?>