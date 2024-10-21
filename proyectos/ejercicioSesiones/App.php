<?php
session_start(); // Iniciar la sesión al principio del archivo

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

    public function auth()
    {
        if (isset($_POST["name"]) && isset($_POST["password"])) {
            if ($_POST['name'] != "" && $_POST['password'] != "") {
                // Almacenar en sesión en lugar de cookies
                $_SESSION["name"] = $_POST['name'];
                $_SESSION["password"] = $_POST['password'];
                header('Location: ?method=home');
            } else {
                header('Location: ?method=login');
            }
        }
    }

    public function new()
    {
        if (isset($_POST['deseo'])) {
            if ($_POST['deseo'] != "") {
                // Usar sesión para la lista de deseos
                if (isset($_SESSION['listaDeseos'])) {
                    $lista = $_SESSION['listaDeseos'];
                } else {
                    $lista = [];
                }
                $lista[] = $_POST['deseo'];
                $_SESSION['listaDeseos'] = $lista; // Almacenar en sesión
            }
        }
        header('Location: ?method=home');
    }

    public function delete()
    {
        if (isset($_POST["numeroDeseo"])) {
            $numDeseo = (int)$_POST["numeroDeseo"];

            if ($numDeseo > 0) {
                if (isset($_SESSION["listaDeseos"])) {
                    $lista = $_SESSION["listaDeseos"];
                    unset($lista[$numDeseo - 1]);
                    $lista = array_values($lista); // Reindexar el array
                    $_SESSION["listaDeseos"] = $lista; // Almacenar en sesión
                }
            }
        }
        header('Location: ?method=home');
    }

    public function empty()
    {
        // Vaciar la lista de deseos en la sesión
        if (isset($_SESSION['listaDeseos'])) {
            unset($_SESSION['listaDeseos']);
        }
        header('Location: ?method=home');
    }

    public function logout()
    {
        // Destruir la sesión
        session_destroy();
        header("Location: ?method=login");
    }
}