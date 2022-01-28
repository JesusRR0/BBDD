<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="encabezado">
        <h1>Ejercicio 11:</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        
        <?php   
        
            $select = $_POST['producto'];
            $conexion = new mysqli('localhost','dwes','abc123','dwes');
            $error = $conexion->connect_errno;
        
            if($error != null){
                echo '<p> Error '.$error.' conectando a la base de datos: '.$conexion->connect_error.'</p>';
                
            }else{

                $producto = $conexion->query("SELECT nombre_corto,cod FROM producto");
                $nCorto = $producto->fetch_object();

                echo '<select name="producto">';
                    
                while($nCorto != null ){
                
                    echo '<option value="'.$nCorto->cod.'">'.$nCorto->nombre_corto .'</option>';
                
                    $nCorto = $producto->fetch_object();
                }
                
                
                echo '</select>';

            }
        ?>
        <input type="submit" value="Enviar Datos">
        </form>
        
        
    </div>
        

    <div id="contenido">
        <h2>Contenido</h2>
        <?php 
        
        $stock = $conexion->query("SELECT producto, tienda, unidades FROM stock");
        $stockF = $stock->fetch_object();

        $tienda = $conexion->query("SELECT cod, nombre FROM tienda");
        $tiendaF = $tienda->fetch_object();
        
        while($stockF != null ){
            
            if($select == $stockF->producto){
                
                echo ' Quedan '.$stockF->unidades.' con codigo: '.$select;
                
                while($tiendaF != null){
                    if($stockF->tienda == $tiendaF->cod){
                        echo ' en la tienda '.$tiendaF->nombre."<br>";
                    }
                    $tiendaF = $tienda->fetch_object();

                }               
            }
            
            $stockF = $stock->fetch_object();
        }
        
        $conexion->close();
        ?>
    </div>

    <div id="pie">
        
    </div>
    
</body>
</html>