<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1); 
        require('./util/conexion.php'); // Conexión a la base de datos
       session_start();
       /* if(!isset($_SESSION["usuario"])) {
            header("location: usuario/iniciar_sesion.php");
            exit;
        }*/
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #b0008e;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
    <?php if (isset($_SESSION["usuario"])) { ?>
           
           <a href="cambiar_contraseña.php" class="btn btn-warning">Cambiar Contraseña</a>
           <a href="./usuario/cerrar_sesion.php" class="btn btn-warning">Cerrar Sesion</a>
           <a href="./productos/index.php" class="btn btn-warning">productos</a>
           <a href="./categorias/index.php" class="btn btn-warning">categoria</a>
       <?php } else { ?>
           
           <a href="usuario/iniciar_sesion.php" class="btn btn-danger">Iniciar Sesión</a>
       <?php } ?>
  
   
   
     <h1>Listado de productos</h1>
    

  
        
        <?php
            // Selecciona los datos de la tabla creada en Workbench
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion->query($sql);
        ?>

<?php
         if($_SERVER["REQUEST_METHOD"] == "POST") {
             $id_producto = $_POST["id_producto"];
             //echo "<h1>$id_anime</h1>";
             $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
             $_conexion -> query($sql);
         }
    ?>
       <!-- <a class="btn btn-secondary" href="nuevo_producto.php">Nuevo producto</a><br><br>-->
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                   <!-- <th>Accion</th>
                    <th>Acción</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$fila["id_producto"]}</td>";
                        echo "<td>{$fila["nombre"]}</td>";
                        echo "<td>{$fila["precio"]}</td>";
                        echo "<td>{$fila["categoria"]}</td>";
                        echo "<td>{$fila["stock"]}</td>";
                        echo "<td>{$fila["descripcion"]}</td>";
                        
                       /* echo "<td><img src='{$fila["imagen"]}' width='50' height='80'></td>";*/
                       ?>
                     <!--  <td>
                    <form action='' method='post'>
                        <input type='hidden' name='id_producto' value="<?php// echo $fila["id_producto"] ?>">
                        <input class='btn btn-danger' type='submit' value='Borrar'>
                    </form>
                </td>
                <td>
                            <a class="btn btn-primary" 
                               href="editar_producto.php?id_producto=<?php// echo $fila["id_producto"] ?>">Editar</a>
                </td>
                    -->

                    <?php     echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
</body>
</html>