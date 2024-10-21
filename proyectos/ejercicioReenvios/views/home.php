<html>

<head>
    <title>Lista de Deseos</title>
</head>

<body>
    
    <h1>Estas en el home</h1>
    <h2>Introduce tu deseo:</h2>

    <form action="?method=new" method="post">
        <label for="">Deseo</label>
        <input type="text" name="deseo" > <br>
    </form>

    
    <ol>
        <?php
        if (isset($_COOKIE['listaDeseos'])) {
            $lista = unserialize($_COOKIE['listaDeseos']);

                foreach ($lista as $deseo) {
                    echo "<li>" . $deseo . "</li>";
                }
            }
          
        ?>
    </ol>

    <form action="?method=delete" method="post">
        <label for="">Borrar deseo</label>
        <input type="text" name="numeroDeseo" > <br>
    </form>

    <a href="?method=empty">Borrar lista</a><br>

    <a href="?method=logout">logout</a>

   
</body>

</html>