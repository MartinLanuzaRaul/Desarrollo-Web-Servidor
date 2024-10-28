<?php
class ProductoNoEncontradoException extends Exception {
    public function errorMessage() {
        return "El producto no se encontró en el inventario.";
    }
}
?>