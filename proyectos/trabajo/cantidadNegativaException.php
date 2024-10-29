<?php
class cantidadNegativaException extends Exception {
    public function errorMessage() {
        return "La cantidad debe ser mayor que cero.";
    }
}
?>