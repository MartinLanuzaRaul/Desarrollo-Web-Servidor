<?php
session_start(); // Iniciar la sesión al principio del archivo
?>

<html>
<head>
    <title>Lista de Deseos</title>
</head>
<body>
    
    <h1>Estas en el home</h1>
    <h2>Introduce tu deseo:</h2>

    <form action="?method=new" method="post">
        <label for="">Deseo</label>
        <input type="text" name="deseo"> <br>
        <input type="submit" value="Agregar Deseo"> <!-- Botón para enviar el deseo -->
    </form>

    <ol>
        <?php
        // Verificar si la lista de deseos está en la sesión
        if (isset($_SESSION['listaDeseos'])) {
            $lista = $_SESSION['listaDeseos'];

            foreach ($lista as $deseo) {
                echo "<li>" . htmlspecialchars($deseo) . "</li>"; // Usar htmlspecialchars para evitar XSS
            }
        }
        ?>
    </ol>

    <form action="?method=delete" method="post">
        <label for="">Borrar deseo</label>
        <input type="text" name="numeroDeseo"> <br>
        <input type="submit" value="Borrar Deseo"> <!-- Botón para borrar el deseo -->
    </form>

    <a href="?method=empty">Borrar lista</a><br>
    <a href="?method=logout">Logout</a>

</body>
</html>