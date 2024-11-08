<html>
    <head>

    </head>
    <body>
        <h1>CONSULTAS</h1>

        <p>Consulta 1 <a href="?method=consulta1"> <input id="btnConsulta1" type="button" value="realizar"> </a></p>
        <p>Consulta 2 <a href="?method=consulta2"> <input id="btnConsulta2" type="button" value="realizar"> </a></p>
        <p>Consulta 3 <a href="?method=consulta3"> <input id="btnConsulta3" type="button" value="realizar"> </a></p>
        <p>Consulta 4 </p>
        <form id="formConsulta4" action="?method=consulta4" method="post">
        <label for="" id="labelCodigoLibro">Codigo de libro</label>
        <input type="text" name="codigoLibro">
        <label for="" id="labelCodigoTienda">Codigo de tienda</label>
        <input type="text" name="codigoTienda">
        <input id="btnEliminar" type="submit" value="Buscar">
    </form>

        

    </body>
</html>