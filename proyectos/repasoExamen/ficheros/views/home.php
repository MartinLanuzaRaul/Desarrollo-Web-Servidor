<!DOCTYPE html>
<head>
    
</head>
<body>
<form action="?method=anyadirProducto" method="post">
<label for="fname">Producto:</label><br>
  <input type="text" id="producto" name="producto"><br>
  <input type="submit" value="Submit">
</form> 

<form action="?method=mostrarProductos" method="post">
<input type="submit" value="Mostrar">

</form>


<?php 
   echo $content;

?>
</body>
</html>