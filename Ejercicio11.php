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

        ini_set('display_errors','1');
        error_reporting(E_ALL);

        $consulta = $conexion->query("SELECT t.nombre, p.nombre_corto, s.unidades FROM tienda t 
        JOIN stock s ON t.cod=s.tienda JOIN producto p ON p.cod=s.producto WHERE s.producto='".$select."';");

        $consultaF = $consulta->fetch_object();

        while($consultaF !=null){
            
            echo 'Quedan '.$consultaF->unidades.' del producto '.$consultaF->nombre_corto.' de la tienda '.$consultaF->nombre."<br>";

            $consultaF = $consulta->fetch_object();
        }

        
        $conexion->close();
        ?>
    </div>

</body>
</html>