<?php

require_once 'models/Model.php';

class Videojuego extends Model
{

    private $id;
    private $Name;
    private $Platform;
    private $Year;
    private $Genre;
    private $Publisher;
    private $NA_Sales;
    private $EU_Sales;
    private $JP_Sales;
    private $Other_Sales;
    private $Global_Sales;


    public static function consultarTodos()
    {

        try {
            $conexion = Videojuego::db();


            $sql1 = "SELECT * FROM videojuego";

            $resultado = $conexion->query($sql1);


            $todosVidejuegos= $resultado->fetchAll(PDO::FETCH_CLASS, Videojuego::class);
        } catch (PDOException) {
            echo "Problema en la conexión";
        } finally {

            return $todosVidejuegos;
        }
    }

    public static function paginate($page = 1, $size = 101)
    {
        //obtener conexión
        $db = Model::db();
        //preparar consulta
        $sql = "SELECT count(id) FROM videojuego";
        //ejecutar
        $statement = $db->query($sql);
        //recoger datos con fetch_all
        $n = (int) $statement->fetch()[0]; //registros
        $n = ceil($n / $size); //pages

        $offset = ($page - 1) * $size;
        $sql1 = "SELECT * FROM videojuego LIMIT $offset, $size";
        $sql2 = "SELECT * FROM videojuego WHERE id > $offset LIMIT $size";
        $sql3 = "SELECT * FROM videojuego";
        //ejecutar
        $antes = microtime();
        $statement = $db->query($sql1);
        $despues = microtime();
        echo $despues - $antes;
        //recoger datos con fetch_all
        $videojuegos = $statement->fetchAll(PDO::FETCH_CLASS, Videojuego::class);
        //retornar
        $pages = new stdClass;

        $pages->videojuegos = $videojuegos;
        $pages->n = $n;
        return $pages;
    }

    public static function anyadirVideojuego() {
        try {
            $conexion = Videojuego::db();
    
            $sql1 = "INSERT INTO videojuego (`Name`, `Platform`, `Year`, `Genre`, `Publisher`, `NA_Sales`, `EU_Sales`, `JP_Sales`, `Other_Sales`, `Global_Sales`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $insertarVideojuego = $conexion->prepare($sql1);
            $insertarVideojuego->bindValue(1, $_POST["nameAIntroducir"]);
            $insertarVideojuego->bindValue(2, $_POST["platformAIntroducir"]);
            $insertarVideojuego->bindValue(3, $_POST["yearAIntroducir"]);
            $insertarVideojuego->bindValue(4, $_POST["genreAIntroducir"]);
            $insertarVideojuego->bindValue(5, $_POST["publisherAIntroducir"]);
            $insertarVideojuego->bindValue(6, $_POST["na_salesAIntroducir"]);
            $insertarVideojuego->bindValue(7, $_POST["eu_salesAIntroducir"]);
            $insertarVideojuego->bindValue(8, $_POST["jp_salesAIntroducir"]);
            $insertarVideojuego->bindValue(9, $_POST["other_salesAIntroducir"]);
            $insertarVideojuego->bindValue(10, $_POST["global_salesAIntroducir"]);
    
            $insertarVideojuego->execute();
    
            echo "Inserción de videojuego exitosa";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        }finally{
            return $insertarVideojuego;
        }
    }

    public static function eliminarVideojuego(){
        try {
            $conexion = Videojuego::db();
    
            $sql1 = "DELETE FROM `videojuego` WHERE `id` = ?";
    
            $eliminarVideojuego = $conexion->prepare($sql1);
            $eliminarVideojuego->bindValue(1, $_POST["idAEliminar"]);
            
    
            $eliminarVideojuego->execute();
    
            echo "The game have been succesfully deleted.";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        }
    }

    public static function actualizarVideojuego() {
        try {
            $conexion = Videojuego::db();
    
            $sql1 = "UPDATE `videojuego` SET `NA_Sales` = ?, `EU_Sales` = ?, `JP_Sales` = ?, `Other_Sales` = ?, `Global_Sales` = ? WHERE `id` = ?";
                
            $actualizarVideojuego = $conexion->prepare($sql1);
            $actualizarVideojuego->bindValue(1, $_POST["na_SalesAActualizar"]);
            $actualizarVideojuego->bindValue(2, $_POST["eu_SalesAActualizar"]);
            $actualizarVideojuego->bindValue(3, $_POST["jp_SalesAActualizar"]);
            $actualizarVideojuego->bindValue(4, $_POST["other_SalesAActualizar"]);
            $actualizarVideojuego->bindValue(5, $_POST["global_SalesAActualizar"]);
            $actualizarVideojuego->bindValue(6, $_POST["idAActualizar"]);
            $actualizarVideojuego->execute();
    
            echo "Modificacion de videojuego exitosa";
        } catch (PDOException $e) {
            echo "Problema en la conexión" . $e->getMessage();
        }finally{
            return $actualizarVideojuego;
        }
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Name
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get the value of Platform
     */
    public function getPlatform()
    {
        return $this->Platform;
    }

    public function getGenre()
    {
        return $this->Genre;
    }

    public function getPublisher()
    {
        return $this->Publisher;
    }

    /**
     * Get the value of Year
     */
    public function getYear()
    {
        return $this->Year;
    }



    /**
     * Get the value of NA_Sales
     */
    public function getNA_Sales()
    {
        return $this->NA_Sales;
    }

    /**
     * Get the value of EU_Sales
     */
    public function getEU_Sales()
    {
        return $this->EU_Sales;
    }

    /**
     * Get the value of JP_Sales
     */
    public function getJP_Sales()
    {
        return $this->JP_Sales;
    }

    /**
     * Get the value of Other_Sales
     */
    public function getOther_Sales()
    {
        return $this->Other_Sales;
    }

    /**
     * Get the value of Global_Sales
     */
    public function getGlobal_Sales()
    {
        return $this->Global_Sales;
    }
}
