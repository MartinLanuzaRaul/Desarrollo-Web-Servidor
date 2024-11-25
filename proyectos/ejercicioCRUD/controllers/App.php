<?php

require_once 'models/Videojuego.php';
require_once 'models/Usuario.php';

class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'login';
        }
        $this->$method();
    }

   
    public function login(){
        include("views/login.php");
    }

    public function home()
    {
        if($_GET['page']){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $pages = Videojuego::paginate($page, 10);
       

        include("views/home.php");
    }

    public function vistaAnyadir(){
        
        include("views/introducir.php");
    }

    public function vistaActualizar(){
        include("views/actualizar.php");
    }

    public function new(){
        $videojuegos = Videojuego::anyadirVideojuego();
    
        include("views/introducir.php");

    }

    public function delete(){
        $videojuegos = Videojuego::eliminarVideojuego();
        if($_POST['page']){
            $page = $_POST['page'];
        }else{
            $page = 1;
        }
        $pages = Videojuego::paginate($page, 10);

        include("views/home.php");

    }

    public function update(){
        $videojuegos = Videojuego::actualizarVideojuego();
        include("views/actualizar.php");

    }


    public function obtenerVideojuegos()
    {
        //Llamas al modelo
        $videojuegos = Videojuego::consultarTodos();


        
        //Pasas el resultado a la vista
        include("views/home.php");

    }

    //Ejemplo header
    public function logout()
    {
        header('Location: login');

    }

    public function auth(){
        if($_POST['name'] != "" && $_POST['password'] != ""){

            $encontrado = Usuario::autenticar($_POST['name'], $_POST['password']);
    
            if($encontrado){
                //usuario autenticad, redirige a home
                header('Location: login');
            }else{
                header('Location: login');
            }
        }
    }

    public function auth2(){
        if(isset($_POST['name']) && isset($_POST['password'])){
            if($_POST['name'] != "" && $_POST['password'] != ""){

                $encontrado = Usuario::autenticarSoloUsuario($_POST['name']);

                if (!$encontrado){
                        Usuario::introducirUsuario($_POST['name'], $_POST['password']);

                        header('Location: home');

                }else{
                    $correcto = Usuario::autenticar($_POST['name'], $_POST['password']);

                    if($correcto){
                        header('Location: home');
                    }else{
                        header('Location: login');
                    }
                }
            }
        }
    }

   public function authDefinitivo(){

    
    if(isset($_POST['name']) && isset($_POST['password'])){
        if($_POST['name'] != "" && $_POST['password'] != ""){


            $usuario = Usuario::autenticarSoloUsuarioDevolviendoUsuario($_POST['name']);

            if(!$usuario) {
                $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                Usuario::introducirUsuario($_POST['name'], $hash);
              header('Location: home');
               

            }else{
                $correcto = password_verify($_POST['password'], $usuario['contrasenya']);

                if($correcto){
                    header('Location: home');
                }else{
                    header('Location: login');
                }
            }
        }
    
   }



        
}
}
