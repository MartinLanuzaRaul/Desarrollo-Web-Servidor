<html>

<head>

</head>

<body>
    <h1>CONSULTAS</h1>

    <p>Consulta 1</p>
    <form id="formConsulta1" action="?method=consulta1" method="post">
        <label for="" id="labelNombreAutor">Nombre de autor</label>
        <input type="text" name="nombreAutor">
        <input id="btnConsulta" type="submit" value="Buscar">
    </form>
    <?php
    if (isset($_POST['nombreAutor'])) {
        foreach ($resultadoConsulta1 as $libro) {
            echo $libro['codigo'] . "<br>";
            echo $libro['titulo'] . "<br>";
            echo $libro['agno_publicacion'] . "<br>";
            echo $libro['numero_paginas'] . "<br>";
            echo $libro['precio'] . "<br>";
        }
    }
    else{
        echo "No hay libros de este autor.";
    }
    ?>

    <p>Consulta 2 <a href="?method=consulta2"> <input id="btnConsulta2" type="button" value="realizar"> </a></p>

    <p>Consulta 3 <a href="?method=consulta3"> <input id="btnConsulta3" type="button" value="realizar"> </a></p>

    <p>Consulta 4 </p>
    <form id="formConsulta4" action="?method=consulta4" method="post">
        <label for="" id="labelNombreLibro">Nombre del libro</label>
        <input type="text" name="nombreLibro">
        <input id="btnConsulta" type="submit" value="Buscar">
    </form>


   

    <?php
    if (isset($_POST['nombreLibro'])) {
        foreach ($resultadoConsulta4 as $consulta4) {
            echo $consulta4['centro_comercial'] . "<br>";
            echo $consulta4['cantidad'] . "<br>";
        }
    }
    ?>

<p>Insertar tienda</p>
    <form id="formConsulta1" action="?method=InsertarTienda" method="post">
        <label for="" id="labelNombreLibro">Nombre de la tienda</label>
        <input type="text" name="centroComercial">
        <label for="" id="labelNombreLibro">Direccion</label>
        <input type="text" name="direccion">
        <label for="" id="labelNombreLibro">Localidad</label>
        <input type="text" name="localidad">
        <label for="" id="labelNombreLibro">Telefono</label>
        <input type="text" name="telefono">
        <input id="btnConsulta" type="submit" value="Añadir">
    </form>

    <?php
    if (isset($_POST['centroComercial']) && isset($_POST['direccion']) && isset($_POST['localidad']) && isset($_POST['telefono'])) {
        if($insertartienda == true){
            echo "Se ha insertado una tienda";
        }else{
            echo "No se ha podido insertar la tienda";
        }
    }
    ?>

<p>Borrar tienda</p>
    <form id="formConsulta4" action="?method=borrarTiendaYDisponibilidad" method="post">
        <label for="" id="labelNombreLibro">Codigo de la tienda</label>
        <input type="text" name="codigoTienda">
        <input id="btnConsulta" type="submit" value="Eliminar">
    </form>


   

    <?php
    if (isset($_POST['codigoTienda'])) {
        if($resultadoborradodisponibilidad == true){
            echo "Se ha eliminado una tienda";
        }else{
            echo "No se ha podido eliminar la tienda";
        }
    }
    ?>

<p>Aplicar descuento libros entre dos fechas</p>
    <form id="formConsulta4" action="?method=ActualizarPrecioLibros" method="post">
        <label for="" id="labelNombreLibro">Desde</label>
        <input type="text" name="fechaA">
        <label for="" id="labelNombreLibro">Hasta</label>
        <input type="text" name="fechaB">
        <label for="" id="labelNombreLibro">Descuento</label>
        <input type="text" name="descuento">
        <input id="btnConsulta" type="submit" value="Aplicar">
    </form>

    <?php
    if (isset($_POST['fechaA']) && isset($_POST['fechaB']) && isset($_POST['descuento'])) {
        if($resultadoborradodisponibilidad == true){
            echo "Se han actualizado los precios con exito";
        }else{
            echo "No se han podido actualizar los libros";
        }
    }
    ?>


</body>

</html>