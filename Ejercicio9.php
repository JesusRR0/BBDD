<?php 

$conexion = new mysqli('localhost','dwes','abc123','dwes');
$error = $conexion->connect_errno;

if($error != null){
    echo '<p> Error '.$error.' conectando a la base de datos: '.$conexion->connect_error.'</p>';
    
}else{
    
    $update = $conexion->query("UPDATE tienda SET unidades=1 WHERE tienda=1");
    $insert = $conexion->query("INSERT INTO tienda(producto, tienda, unidades) VALUES ('televisor', 3, 1)");
    
    if($update){
        echo '<p> Se han actualizado '.$conexion->affected_row_update.'</p>';
    }else{
        echo 'error al actualizar <br> ';
    }

    if($insert){
        echo '<p> Se han insertado '.$conexion->affected_row_insert.'</p>';
    }else{
        echo 'error al borrar';
    }
    
}












?>