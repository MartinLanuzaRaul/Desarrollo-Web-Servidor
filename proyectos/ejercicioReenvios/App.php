<?php

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
            if (($_POST['name'] != "" && $_POST['password'] != "")) {
                setcookie("name", $_POST['name'], time() + 3600 * 24);
                setcookie("password", $_POST['password'], time() + 3600 * 24);
                header('Location: ?method=home');
            } else {
                header('Location: ?method=login');
            }
        }
    }

    public function new(){
        if(isset($_POST['deseo'])){
            if($_POST['deseo'] != ""){

                if(isset($_COOKIE['listaDeseos'])){
                    $lista = unserialize($_COOKIE['listaDeseos']);
                }else{
                    $lista = [];
                }
                $lista[] = $_POST['deseo'];
        
                setcookie("listaDeseos", serialize($lista), time() +3600 *24);

            }
        }
        header('Location: ?method=home');
       
    }

    public function delete()
    {
      if(isset($_POST["numeroDeseo"])){
        $numDeseo = (int)$_POST["numeroDeseo"];
  
        if($numDeseo > 0){
          if(isset($_COOKIE["listaDeseos"])){
            $lista = unserialize($_COOKIE["listaDeseos"]);
            unset($lista[$numDeseo -1]);
  
            $lista = array_values($lista);
  
            //--Lo mismo que array_values pero con for--
            /*foreach($lista as $clave=>$valor){
              if($numDeseo -1 == $clave){
              $lista[$numDeseo -1 ] = 0 ;
              }
            }
            foreach($lista as $clave=>$valor){
              if($numDeseo > $clave){
                $lista[$numDeseo] = $lista[$numDeseo + 1];
              }
            }*/
          }
          setcookie("listaDeseos", serialize($lista),time()+ 36000 * 24);
        }
  
      }
      header('Location: ?method=home');

  
    }

    public function empty(){

        if(isset($_COOKIE['listaDeseos'])){
            setcookie("listaDeseos", "", time() -1);
        }
        header('Location: ?method=home');

    }
    
        
    

    public function logout()
    {

        setcookie("name", "", time() - 1);
        setcookie("password", "", time() - 1);

        header("Location: ?method=login");
    }
}
