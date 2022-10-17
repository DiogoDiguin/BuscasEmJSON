<?php

    include ("ClasseExibir.php");
    final class exibirProjetos extends exibir{
        private $id;
        private $titulo;

        /*public function __construct(){
            $this->id = $id;
            $this->titulo = $titulo;
        }*/

        public function getDetalhes() {
            include_once("C:\\xampp\htdocs\diogo\BuscasEmJSON\mvc/views/ViewBuscaProjeto.php");
            projeto($this->id, $this->titulo);
        }

        public function setDetalhes($id, $titulo){
            $this->id = $id;
            $this->titulo = $titulo;
        }

    }

?>