<?php
class Cabecera{
    private $titulo;

    public function __construct($title){
        $this->titulo = $title;
    }

    public function graficar(){
        $estilo = 'text-aling: center';
        echo '<h1 style = "'.$estilo.'">',$this->titulo.'</h1>';
    }
}

?>