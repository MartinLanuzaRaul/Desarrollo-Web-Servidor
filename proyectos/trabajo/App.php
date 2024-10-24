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

    public function registrarProducto()
    {
        include("views/registrarProducto.php");
    }

    public function buscarProducto()
    {
        include("views/buscarProducto.php");
    }

    public function valorTotal()
    {
        include("views/valorTotal.php");
    }

    public function auth()
    {
        if (isset($_POST["mail"]) && isset($_POST["password"])) {



            if ($_POST['mail'] != "" && $_POST['password'] != "") {
                if (strlen($_POST['password']) > 8) {
                    $contraseñaValido = true;
                    $_SESSION["password"] = $_POST['password'];
                } else {
                    $contraseñaValido = false;
                    $_SESSION['errorContraseña'] = "LA CONTRASEÑA DEBE CONTENER MINIMO 8 CARACTERES";
                    header('Location: ?method=login');
                }
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $correoValido = true;
                    $_SESSION["mail"] = $_POST['mail'];
                    setcookie("mail", $_POST['mail'], time() + 3600 * 24);

                } else {
                    $correoValido = false;
                    $_SESSION['errorCorreo'] = "EL CORREO ELECTRÓNICO NO ES VÁLIDO";
                    header('Location: ?method=login');
                }
                if ($contraseñaValido == true && $correoValido == true) {
                    header('Location: ?method=home');
                }
            } else {
                header('Location: ?method=login');
            }
        }
    }


    public function new()
    {
        if (isset($_POST['producto']) && !empty($_POST['producto'])) {
            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidadProducto'];
            $precio = $_POST['precioProducto'];

            if (isset($_COOKIE["mail"])) {
                $mail = $_COOKIE["mail"];
            }

            $productos = [];

            if (isset($_COOKIE['productos'])) {
                $productos = unserialize($_COOKIE['productos']);
            }

            


            $productos[] = [
                'producto' => $producto,
                'cantidad' => $cantidad,
                'precio'   => $precio,
                'mail'     => $mail
            ];

            setcookie("productos", serialize($productos), time() + 3600 * 24);
        }

        header('Location: ?method=registrarProducto');
    }

    public function empty()
    {
        if (isset($_COOKIE['productos'])) {
            setcookie("productos", "", time() - 3600);
        }


        header('Location: ?method=home');
    }



    public function logout()
    {
        session_destroy();
        header("Location: ?method=login");
    }
}
