<?php
    class Opcion{
        private $titulo;
        private $enlace;
        private $colorFondo;

        public function __construct ($tittle, $link, $bcolor){
            $this -> titulo = $tittle;
            $this -> enlace = $link;
            $this -> colorFondo = $bcolor;
        }

        public function graficar(){
            $estilo = 'background-color: '.$this->colorFondo;
            echo '<a style="'.$estilo.' " href="'.$this->enlace.'">'.$this->titulo.'</a>';
        }
    }
?>