<?php
class zeroException extends Exception{
    public function errorMessage(){
        $errorMsg = "No se puede dividir entre 0";
        return $errorMsg;
    }
}
