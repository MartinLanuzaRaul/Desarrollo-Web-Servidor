<html>
    <head>
        <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

#izq {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 400px;
    margin: auto;
    float: left;
    margin-top: 5%;
    margin-left: 20%;
}

#der {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 400px;
    margin: auto;
    float: right;
    margin-top: 5%;
    margin-right: 20%;

}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #218838;
}

#btnVolver{
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    width: 100%;
    margin-top: 2%;
}



        </style>
    </head>
    <body>
        <h1>Mi Biblioteca de Steam</h1>
    <div id="izq">
        <h2>Añadir Videojuego</h2>
        <form action="?method=new" method="post">
            <label for="">ID del videojuego</label>
            <input id="btn" type="text" name="codigoVideojuego"> <br>
            <label for="">Clave</label>
            <input id="btn" type="text" name="clave"> <br>
            <input type="submit" value="Introducir">
        </form>
    </div>

    <div id="der">
    <h2>Eliminar Videojuego</h2>
        <form action="?method=delete" method="post">
            <label for="">ID del videojuego</label>
            <input id="btn" type="text" name="idAEliminar"> <br>
            <input type="submit" value="Eliminar">
        </form>
    </div>

    <a href="?method=home"><input id="btnVolver" type="button" value="volver a la pagina principal"></a>


    </body>
</html>