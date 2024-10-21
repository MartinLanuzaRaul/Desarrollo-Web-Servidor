<?php
session_start(); 

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
        include("views/home.php");
    }

    public function login()
    {
        include("views/login.php");
    }

    public function auth(){
        if (isset($_POST["mail"]) && isset($_POST["password"])) {


            
            if ($_POST['mail'] != "" && $_POST['password'] != "") {
                if(strlen($_POST['password'])>8){
                    $contraseñaValido=true;
                    $_SESSION["password"] = $_POST['password'];
                }else{
                    $contraseñaValido=false;
                    $_SESSION['errorContraseña'] = "LA CONTRASEÑA DEBE CONTENER MINIMO 8 CARACTERES";
                    header('Location: ?method=login');

                    
                }
                if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $correoValido=true;
                    $_SESSION["mail"] = $_POST['mail'];
                }else{
                    $correoValido=false;
                    $_SESSION['errorCorreo'] = "EL CORREO ELECTRÓNICO NO ES VÁLIDO";
                    header('Location: ?method=login');

                }
                if($contraseñaValido==true && $correoValido==true){
                    header('Location: ?method=home');
                }
                
            } else {
                header('Location: ?method=login');
            }
        }
    }
}