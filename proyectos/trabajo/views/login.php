<html>

<head>
    <title>Formulario</title>
    <style>
        #errorContraseña{
            color: red;
        }
    </style>
</head>

<body>
    
    <h1>Login</h1>

    <form action="?method=auth" method="post">
        <label for="">Correo electronico</label>
        <input type="text" name="mail"> <br>
        <label for="">contraseña</label>
        <input type="password" name="password"> <br>
        <input type="submit" value="Iniciar sesión">
    </form>

    <?php
    
        

        if(isset($_SESSION['errorContraseña'])){
            echo "<p id='errorContraseña'> LA CONTRASEÑA DEBE TENER MINIMO 8 CARACTERES</p>";
        }
        if(isset($_SESSION['errorCorreo'])){
            echo "<p id='errorContraseña'> EL CORREO ES INCORRECTO</p>";
        }
        unset($_SESSION['errorContraseña']);
        unset($_SESSION['errorCorreo']);
    
        
        ?>
</body>

</html>