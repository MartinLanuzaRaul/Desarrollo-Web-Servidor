

<html>  
<body>

<form>
Nombre: <input type="text" name="nombre"><br>
<input type="submit">
<?php
if (isset($_GET['nombre']) && isset($_GET['nombre']) != "" )  {

    $nombre = $_GET['nombre'];
    echo  "Hola " . $nombre;

  } else {
    echo "El nombre es obligatorio";
  }
?>
</form>

</body>
</html>

