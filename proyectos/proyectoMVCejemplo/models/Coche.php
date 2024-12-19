<?php

require_once 'models/Model.php';

class Coche extends Model
{

    private $id;
    private $marca;
    private $modelo;
    private $tipo;
    private $precioBajo;
    private $precioAlto;

    public static function paginate($page = 1, $size = 10)
    {
        //obtener conexión
        $db = Model::db();
        //preparar consulta
        $sql = "SELECT count(id) FROM Coche";
        //ejecutar
        $statement = $db->query($sql);
        //recoger datos con fetch_all
        $n = (int) $statement->fetch()[0]; //registros
        $n = ceil($n / $size); //pages

        $offset = ($page - 1) * $size;
        $sql1 = "SELECT * FROM Coche LIMIT $offset, $size";

        //ejecutar
        $statement = $db->query($sql1);

        //recoger datos con fetch_all
        $coches = $statement->fetchAll(PDO::FETCH_CLASS, Coche::class);
        //retornar
        $pages = new stdClass;

        $pages->coches = $coches;
        $pages->n = $n;
        return $pages;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of precioBajo
     */
    public function getPrecioBajo()
    {
        return $this->precioBajo;
    }

    /**
     * Set the value of precioBajo
     *
     * @return  self
     */
    public function setPrecioBajo($precioBajo)
    {
        $this->precioBajo = $precioBajo;

        return $this;
    }

    /**
     * Get the value of precioAlto
     */
    public function getPrecioAlto()
    {
        return $this->precioAlto;
    }

    /**
     * Set the value of precioAlto
     *
     * @return  self
     */
    public function setPrecioAlto($precioAlto)
    {
        $this->precioAlto = $precioAlto;

        return $this;
    }
}
