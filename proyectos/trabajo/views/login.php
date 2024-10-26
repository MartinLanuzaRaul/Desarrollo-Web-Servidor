<html>

<head>
    <title>Formulario</title>
    <style>
        body {
    font-family: Arial, sans-serif; 
    background-color: #f4f4f4; 
    margin: 0; 
    padding: 0; 
}

#header {
    text-align: center; 
    margin-bottom: 20px; 
}

#logo {
    display: block;
    margin: 0 auto; 
    max-width: 300px;
    height: auto; 
}

#div {
    border: solid 1px #ddd; 
    border-radius: 8px; 
    width: 350px;
    margin: 50px auto; 
    padding: 20px; 
    background-color: white; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

#titulo {
    margin-bottom: 20px; 
    color: #333; 
}

label {
    display: block; 
    margin-bottom: 5px; 
    color: #555; 
}

#email, #password {
    width: 100%; 
    padding: 10px; 
    margin-bottom: 15px; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
    box-sizing: border-box; 
}

#iniciarSesion {
    width: 100%; 
    padding: 10px; 
    background-color: #e7ad3e; 
    border: none; 
    border-radius: 4px; 
    color: white; 
    cursor: pointer; 
}

#iniciarSesion:hover {
    background-color: #d69e2a; 
}

#errorContraseña {
    color: red;
    text-align: center;
    margin-top: 10px; 
}
        
    </style>
</head>

<body>
    <header id="header">
        <img src="imagenes/logo.png" id="logo">
    </header>
    <div id="div">
        <h1 id="titulo">Login</h1>

        <form id="formulario" action="?method=auth" method="post">
            <label for="email">Correo electrónico</label><br>
            <input type="text" id="email" name="mail"> <br>
            <label for="password">Contraseña</label><br>
            <input type="password" id="password" name="password"> <br>
            <input id="iniciarSesion" type="submit" value="Iniciar sesión">
        </form>

        <?php
        if (isset($_SESSION['errorContraseña'])) {
            echo "<p id='errorContraseña'>LA CONTRASEÑA DEBE TENER MÍNIMO 8 CARACTERES</p>";
        }
        if (isset($_SESSION['errorCorreo'])) {
            echo "<p id='errorContraseña'>EL CORREO ES INCORRECTO</p>";
        }
        unset($_SESSION['errorContraseña']);
        unset($_SESSION['errorCorreo']);
        ?>
    </div>
</body>

</html>