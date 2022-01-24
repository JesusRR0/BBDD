
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    $conexion = new mysqli('localhost','dwes','abc123','dwes');
    $error = $conexion->connect_errno;

    if($error != null){
        echo '<p> Error '.$error.' conectando a la base de datos: '.$conexion->connect_error.'</p>';
        
    }else{
        
        $update = $conexion->query("UPDATE stock SET unidades=1 WHERE tienda=1");
        $insert = $conexion->query("INSERT INTO stock (producto, tienda, unidades) VALUES ('3DSNG', 3, 1)");
        
        if($update){
            echo '<p> Se han actualizado '.$conexion->affected_rows .' filas </p>';
        }else{
            echo 'error al actualizar <br> ';
        }

        if($insert){
            echo '<p> Se han insertado '.$conexion->affected_rows.'</p>';
        }else{
            echo 'error al borrar';
        }
        
    }
?>
</body>
</html>













