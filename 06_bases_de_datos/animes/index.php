<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('conexion.php');  //Conexión a la base de datos:Importa un archivo externo,ES COMO EL IMPORTA DE JAVA ,SINO NO SE CONECTA 
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #b0008e;
            color: white;
        }
    </style>
</head>
<body>
    <!--El archivo index.php es la página principal del sistema. Realiza las siguientes funciones:
        Conexión a la base de datos:
        Eliminar animes:
        consultar y mostrar animes:
        Agregar nuevos animes:
        Interactividad:
        Permite al usuario ver la lista completa de animes.
      Ofrece un botón para borrar cualquier anime,-->

    <div class="container">
        <h1>Listado de animes</h1>
        <?php
        // Bloque para manejar la eliminación de un anime

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_anime = $_POST["id_anime"];  //Si se cumple, obtiene el id_anime desde los datos enviados:
                //echo "<h1>$id_anime</h1>";
                $sql = "DELETE FROM animes WHERE id_anime = '$id_anime'";  //Crea una consulta SQL para eliminar el anime con ese id_anime:
                $_conexion -> query($sql);
            }

            // 
            // Consulta para obtener todos los animes
         //Guarda los resultados de la consulta en la variable $resultado.
            // Esto permite acceder a todos los datos de los animes para mostrarlos en la página.
            $sql = "SELECT * FROM animes";
            $resultado = $_conexion -> query($sql);
        ?>
        <!-- Botón para agregar un nuevo anime-->
        <a class="btn btn-secondary" href="nuevo_anime.php">Nuevo anime</a><br><br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Llenado dinámico de la tabla
                //Recorre cada registro obtenido de la consulta SQL ($resultado).
                //Cada fila de la base de datos se convierte en un array asociativo accesible mediante $fila['columna'].
                    while($fila = $resultado -> fetch_assoc()) {
                        // ["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>" . $fila["titulo"] . "</td>";
                        echo "<td>" . $fila["nombre_estudio"] . "</td>";
                        echo "<td>" . $fila["anno_estreno"] . "</td>";
                        echo "<td>" . $fila["num_temporadas"] . "</td>";
                        ?>
                        <td>
                            <!--Muestra la imagen asociada al anime.
                             El atributo src utiliza el valor de la columna imagen (que almacena la ruta de la imagen).-->
                            <img width="50" heigth="80" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <td>
                            <!--Muestra un botón "Borrar" dentro de un formulario.
                    Utiliza un campo oculto 
                (<input type="hidden">) para enviar el id_anime 
                correspondiente al anime que el usuario quiere eliminar.
            Cuando el usuario presiona el botón, el formulario se envía como un POST,
             y se ejecuta el código de eliminación al inicio del archivo.-->

                            <form action="" method="post">
                                <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
   
</body>
</html>