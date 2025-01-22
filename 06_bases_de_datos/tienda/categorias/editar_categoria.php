<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        // Configuración para mostrar errores en el entorno de desarrollo
        error_reporting(E_ALL); // Muestra todos los errores de PHP
        ini_set("display_errors", 1); // Activa la visualización de errores

        // Importa el archivo para la conexión con la base de datos
        require('../util/conexion.php');
    
        // Inicia la sesión del usuario
        session_start(); // Permite gestionar variables de sesión, como el usuario logueado
        if (!isset($_SESSION["usuario"])) { // Verifica si la variable de sesión 'usuario' no está definida
            // Si no hay un usuario logueado, redirige al formulario de inicio de sesión
            header("location: ../usuario/iniciar_sesion.php");
            exit; // Termina la ejecución del script
        }
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        require('../util/conexion.php');
      
    ?>
</head>
<body>
    <div class="container">
        <?php
            $sql = "SELECT * FROM categorias ORDER BY nombre";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            //var_dump($resultado);

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["nombre"]);
            }
            //print_r($estudios);

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
            
              
                // $_FILES, QUE ES UN ARRAY DOBLE!!!

               /* $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                move_uploaded_file($direccion_temporal, "imagenes/$nombre_imagen");*/

                $sql = "INSERT INTO categorias
                    ( nombre, descripcion )
                    VALUES
                    ( '$nombre', 'descripcion')
                ";

                $_conexion -> query($sql);  
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
           
            <div class="mb-3">
                <label class="form-label">nombre</label>
                <input class="form-control" name="nombre" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">descripcion</label>
                <input class="form-control" name="descripcion" type="text">
           
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
-----------------------
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>

    <div class="container">
    <?php
        // Función para limpiar y validar entradas de texto
        function depurar(string $entrada): string {
            // Convierte caracteres especiales a entidades HTML para evitar ataques XSS
            $salida = htmlspecialchars($entrada); 
            // Elimina espacios en blanco al inicio y final
            $salida = trim($salida);
            // Reemplaza múltiples espacios consecutivos por un solo espacio
            $salida = preg_replace('/\s+/', ' ', $salida); 
            return $salida;
        }
    ?>
    <?php
        // Comprobar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = 0; // Variable para contar errores de validación

            // Sanitiza y valida la categoría seleccionada
            $categoria = depurar($_POST["categoria"]);
            
            // Sanitiza y valida la descripción proporcionada
            $tmp_descripcion = depurar($_POST["descripcion"]);
            $val_descripcion = validar($tmp_descripcion, "categoria", "descripcion");
            if ($val_descripcion === true) {
                $descripcion = $tmp_descripcion; // Descripción válida
            } else {
                $error++; // Incrementa el contador de errores
            }

            // Si no hay errores, realiza la actualización en la base de datos
            if ($error === 0) {
                $sql = "UPDATE categorias SET
                    descripcion = '$descripcion'
                WHERE nombre = '$categoria'";
                
                $_conexion->query($sql); // Ejecuta la consulta de actualización
            }
        }

        // Obtiene los datos de la categoría seleccionada para mostrarlos en el formulario
        $_categoria = $_GET["nombre"]; // Recupera la categoría desde la URL
        $sql = "SELECT * FROM categorias WHERE nombre = '$_categoria'";
        $resultado = $_conexion->query($sql); // Ejecuta la consulta
        
        // Crea un arreglo para almacenar las categorías disponibles
        $categorias = [];
        while ($fila = $resultado->fetch_assoc()) { // Recorre los resultados de la consulta
            array_push($categorias, $fila["nombre"]); // Agrega cada categoría al arreglo
        }
    ?>
    <div class="container">
        <!-- Formulario para editar la categoría -->
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, necesario si se suben archivos --> 
            <div class="mb-3">
                <label class="form-label">Categorías</label>
                <select class="form-select" name="categoria"> <!-- Menú desplegable para seleccionar la categoría -->
                    <option value="" selected disabled hidden>--- Elige una categoría ---</option>
                    <?php foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        
            <div class="mb-3">
                <input type="hidden" name="categoria" value="<?php echo $categoria["nombre"] ?>"> <!-- Campo oculto para pasar la categoría actual -->
                <input class="btn btn-primary" type="submit" value="Editar"> <!-- Botón para enviar el formulario -->
                <a class="btn btn-secondary" href="./index.php">Volver</a> <!-- Enlace para regresar -->
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>










