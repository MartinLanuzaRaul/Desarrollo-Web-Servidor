<html>
    <head>
        <style>
            /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

/* Contenedor del formulario */
div {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 400px;
    margin: auto;
}

/* Estilos de las etiquetas */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Estilos de los campos de entrada */
input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Estilos del botón de envío */
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

/* Efecto hover para el botón de envío */
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
}



        </style>
    </head>
    <body>
    <a href="?method=home"><input id="btnVolver" type="button" value="Go back"></a>
    <div>
        <form action="?method=new" method="post">
            <label for="">Name</label>
            <input id="btn" type="text" name="nameAIntroducir"> <br>
            <label for="">Platform</label>
            <input id="btn" type="text" name="platformAIntroducir"> <br>
            <label for="">Year</label>
            <input id="btnCantidadProducto" type="number" name="yearAIntroducir"> <br>
            <label for="">Genre</label>
            <input id="btn" type="text" name="genreAIntroducir"> <br>
            <label for="">Publisher</label>
            <input id="btn" type="text" name="publisherAIntroducir"> <br>
            <!-- step para que acepte numeros decimales-->
            <label for="">NA Sales</label>
            <input id="btnPrecio" type="number" step="0.01" name="na_salesAIntroducir"> <br>
            <label for="">EU Sales</label>
            <input id="btnPrecio" type="number" step="0.01" name="eu_salesAIntroducir"> <br>
            <label for="">JP Sales</label>
            <input id="btnPrecio" type="number" step="0.01" name="jp_salesAIntroducir"> <br>
            <label for="">Other Sales</label>
            <input id="btnPrecio" type="number" step="0.01" name="other_salesAIntroducir"> <br>
            <label for="">Global Sales</label>
            <input id="btnPrecio" type="number" step="0.01" name="global_salesAIntroducir"> <br>
            <input id="btnRegistrar" type="submit" value="Add game">
        </form>
    </div>

    </body>
</html>