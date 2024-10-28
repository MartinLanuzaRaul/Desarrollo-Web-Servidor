<?php
class negativoException extends Exception {
    public function errorMessage() {
        return "El precio del producto no puede ser negativo.";
    }
}
?>