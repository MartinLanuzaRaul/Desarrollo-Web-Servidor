<html>

<head>
    <title>Formulario</title>
</head>

<body>
    <div id="div">
        <h1 id="titulo">Login</h1>

        <form id="formulario" action="?method=authDefinitivo" method="post">
            <label for="name">Usuario</label><br>
            <input type="text" id="name" name="name"> <br>
            <label for="password">Contraseña</label><br>
            <input type="password" id="password" name="password"> <br>
            <input id="iniciarSesion" type="submit" value="Iniciar sesión">
        </form>

    </div>
</body>

</html>