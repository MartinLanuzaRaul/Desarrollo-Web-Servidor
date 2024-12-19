<?php

require_once 'model/Videojuego.php';

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
        /*if($_GET['page']){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $pages = Videojuego::paginate($page, 5);*/
       

        include("views/home.php");
    }

    public function miLista(){
        include('views/miLista.php');

    }

    public function obtenerVideojuegos()
    {
        //Llamas al modelo
        $videojuegos = Videojuego::consultarTodos();


        
        //Pasas el resultado a la vista
        include("views/home.php");

    }

    public function new(){
        $videojuegos = ListaSteam::anyadirVideojuego();

    
        include("views/miLista.php");

    }

    public function delete(){
        $videojuegos = ListaSteam::eliminarVideojuego();

        include("views/miLista.php");

    }
    

    
}
