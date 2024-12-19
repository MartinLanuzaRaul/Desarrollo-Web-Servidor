<?php

require_once 'models/Coche.php';
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

    public function home()
    {
        if ($_GET['page']) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        //buscar datos
        $pages = Coche::paginate($page, 8);

        //pasar a la vista
        include('views/home.php');
    }

    public function login(){
        include('views/login.php');
    }

    public function logout()
    {
        header('Location: login');
    }

    public function auth()
    {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            if ($_POST['name'] != "" && $_POST['password'] != "") {

                $usuario = Usuario::autenticar($_POST['name']);

                if (!$usuario) {
                    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    Usuario::introducirUsuario($_POST['name'], $hash);

                    header('Location: home');

                }else {
                    
                    $correcto = password_verify($_POST['password'], $usuario->getContrasenya());                    

                    if ($correcto) {
                        header('Location: home');
    
                    }else {
                        header('Location: login');
                    }                
                }

            } else {
                header('Location: login');
            }
        }
    }
}
