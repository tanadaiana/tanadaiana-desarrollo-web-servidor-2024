<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('conexion.php')
    ?>
    <style>
        .table-primary{
            --bs-table-color-state:green;
            --bs-table-bg:beige;
        }
    </style>
</head>
<body>

    <div class="container">
        
            <?php 
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    $id_producto = $_POST["id_producto"];
                    $nombre = $_POST["nombre"];
                    $categoria = $_POST["categoria"];
                    $precio = $_POST["precio"];
                    $stock = $_POST["stock"];

                    $sql = "UPDATE productos SET
                            nombre = '$nombre',
                            categoria = '$categoria',
                            precio = $precio,
                            stock = $stock
                            WHERE id_producto = $id_producto";
                    
                    $_conexion -> query($sql);
                }
            ?>
            
            <?php
                $sql = "SELECT * FROM categorias ORDER BY nombre_categoria";
                $resultado = $_conexion -> query($sql);

                $categorias = [];

                var_dump($resultado);

                while($fila = $resultado -> fetch_assoc()){
                    array_push($categorias, $fila["nombre_categoria"]);
                }
                
                echo "<h1>". $_GET["id_producto"] ."</h1>";

                $id_producto = $_GET["id_producto"];
                $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
                $resultado = $_conexion -> query($sql);
                
                $producto = $resultado -> fetch_assoc();

            ?>


            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" 
                    value="<?php echo $producto["nombre"] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categoría</label>
                <select name="categoria" id="" class="form-select">
                    <option value="<?php echo $producto["categoria"] ?>" selected>
                        <?php echo $producto["categoria"] ?>
                    </option>
                    <?php
                        foreach ($categorias as $categoria) { 
                        ?>
                        <option value=" <?php echo $categoria ?> "> 
                            <?php echo $categoria ?> 
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" 
                    value="<?php echo $producto["precio"] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock" 
                    value="<?php echo $producto["stock"] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a href="index.php" class="btn btn-primary">Volver</a>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>