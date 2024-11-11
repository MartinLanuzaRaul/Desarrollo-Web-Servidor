<html>

<head>

</head>

<body>
    <h1>CONSULTAS</h1>

    <p>Consulta 1</p>
    <form id="formConsulta1" action="?method=obtenerLibros" method="post">
        <label for="" id="labelNombreAutor">Nombre de autor</label>
        <input id="nombreAutor" type="text" name="nombreAutor">
        <input id="btnConsulta" type="submit" value="Buscar">
    </form>
    
    <?php
    
    if (isset($_POST['nombreAutor'])) {
        foreach ($libros as $libro) {
            echo $libro->getCodigo()  . "<br>";
            echo $libro->getTitulo() . "<br>";
            echo $libro->getCodigo_escritor()  . "<br>";
            echo $libro->getAgno_publicacion() . "<br>";
            echo $libro->getNumero_paginas()  . "<br>";
            echo $libro->getPrecio()  . "<br>";
        }
    }
    else{
        echo "No hay libros de este autor.";
    }
   
    
    ?>


</body>

</html>