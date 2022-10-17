<?php

    class perfil{
        private $id;

        public function __construct($id){
            $this->id = $id;
        }

        public function getDetalhes(){
            include("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc/views/ViewPerfil.php");
            return perfil($this->id);
        }

        /*public function setId($valor){
            $this->id = $valor;
        }*/
    }
?>