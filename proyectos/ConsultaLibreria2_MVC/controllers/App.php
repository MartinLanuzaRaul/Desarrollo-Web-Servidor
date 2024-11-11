<?php

require_once 'models/Libro.php';

class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this->$method();
    }

    public function home()
    {
        include("views/home.php");
    }

    public function obtenerLibros(){
        $nombreAutor = $_POST['nombreAutor'];
        $libros = Libro::consulta1($nombreAutor);

        include("views/home.php");
    }


}