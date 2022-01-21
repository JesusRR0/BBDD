<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="encabezado">
        <h1>Ejercicio 11</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        </form>
    </div>

    <div>

    <?php 
            $conexion = new mysqli('localhost','dwes','abc123','dwes');
            $error = $conexion->connect_errno;
        
            if($error != null){
                echo '<p> Error '.$error.' conectando a la base de datos: '.$conexion->connect_error.'</p>';
                
            }

            $producto = $conexion->query("SELECT nombre_corto FROM producto");
            $n_corto = $producto->fetch_array();

            echo '<select name="producto">';
                
            while($n_corto !== null ){
                
                echo '<option value="'.$n_corto->nombre_corto.'">'.$n_corto->nombre_corto .'</option>';
            
                $n_corto = $producto->fetch_array();
                                    
            }
            echo "</select>";
        ?>


    </div>
        

    <div id="contenido">
        <h2>Contenido</h2>
    </div>

    <div id="pie"> </div>

</body>
</html>