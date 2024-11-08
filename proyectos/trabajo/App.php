<?php
session_start();

require_once "negativoException.php";
require_once "cantidadNegativaException.php";
    
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
    try {
        if (isset($_POST['producto']) && ($_POST['producto']) != "") {
            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidadProducto'];
            $precio = $_POST['precioProducto'];

            if ($precio < 0) {
                throw new NegativoException();
            }

            if ($cantidad <= 0) {
                throw new cantidadNegativaException();
            }
    
                if (isset($_COOKIE["mail"])) {
                    $mail = $_COOKIE["mail"];
                }
    
                if (isset($_COOKIE['productos'])) {
                    $productos = unserialize($_COOKIE['productos']);
                } 
                $productosActualizados = [];
                $productoExistente = false;
    
                foreach ($productos as $prod) {
                    if ($prod['producto'] == $producto) {
                        $prod['cantidad'] += $cantidad; 
                        $prod['precio'] = $precio;       
                        $prod['mail'] = $mail;          
                        $productoExistente = true;
                    }
                    $productosActualizados[] = $prod;
                }
    
                if (!$productoExistente) {
                    $nuevoProducto = [
                        'producto' => $producto,
                        'cantidad' => $cantidad,
                        'precio'   => $precio,
                        'mail'     => $mail
                    ];
                    $productosActualizados[] = $nuevoProducto;
                }

                setcookie("productos", serialize($productosActualizados), time() + 3600 * 24); 
    
                setcookie("errorNegativo", false, time() - 3600);
                setcookie("errorCantidadNegativa", false, time() - 3600);
                setcookie("errorMessage", '', time() - 3600);
    
                header('Location: ?method=registrarProducto');
            }
        } catch (NegativoException $e) {
            setcookie("errorNegativo", true, time() + 3600 * 24);
            setcookie("errorMessage", $e->errorMessage(), time() + 3600 * 24);
            header('Location: ?method=registrarProducto');
        } catch (cantidadNegativaException $e) {
            setcookie("errorCantidadNegativa", true, time() + 3600 * 24);
            setcookie("errorMessage", $e->errorMessage(), time() + 3600 * 24);
            header('Location: ?method=registrarProducto');
        }
    }

    public function empty()
    {
        if (isset($_COOKIE['productos'])) {
            setcookie("productos", "", time() - 3600);
        }


        header('Location: ?method=home');
    }

    public function borrarProducto()
    {
        if (isset($_COOKIE['productos'])) {
            $productos = unserialize($_COOKIE['productos']);
            $productoAEliminar = $_POST['productoAEliminar'];
    
            $productosActualizados = [];
    
            foreach ($productos as $producto) {
                if ($producto['producto'] !== $productoAEliminar) {
                    $productosActualizados[] = $producto;
                }
            }
    
            setcookie("productos", serialize($productosActualizados), time() + 3600 * 24); 
            
        }
    
        header('Location: ?method=home');
    }



    public function logout()
    {
        session_destroy();
        header("Location: ?method=login");
    }
}
