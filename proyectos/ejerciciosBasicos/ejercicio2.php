<?php
    $nombre = "Raul";
    $direccion = "calle tal";
    $mail = "correo@xd.fr";

    ?>

    <html>
        <body>
        <table>
            <tr>
                <td> nombre </td>
                <td> direccion </td>
                <td> mail </td>  
            </tr>
            <tr>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $direccion; ?></td>
                <td><?php echo $mail; ?></td>  
            </tr>
        </table>
    </body>
    </html>