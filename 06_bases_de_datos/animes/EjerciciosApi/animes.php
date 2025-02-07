<!-- Estructura base del documento HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
</head>
<body>
    <?php
        // Obtención del ID del anime desde la URL y construcción de la API
        $url = "https://api.jikan.moe/v4/anime/" . $_GET['id']. "/full";  /*/fullpermite obtener toda la información del anime..*/
      
        
        // Inicialización de cURL para hacer la petición HTTP
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // Configurar URL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Indicar que queremos recibir el contenido como string
        
        // Ejecutar la solicitud y cerrar cURL
        $respuesta = curl_exec($curl);
        curl_close($curl);

        
        $datos = json_decode($respuesta, true);// Decodificar la respuesta JSON en un array asociativo
        $anime = $datos["data"]; // Extraer la información relevante del anime
    ?>

    <!-- Tabla para mostrar la información del anime -->
    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Sinopsis</th>
                <th>Géneros</th>
                <th>Productoras</th>
                <th>Imagen</th>
                <th>Año</th>
                <th>Bonus Track</th>
                <th>Animes Relacionados</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $anime["title_japanese"] ?></td>
                <td><?php echo $anime["synopsis"] ?></td>
                <td>
                <?php 
                    // Mostrar géneros del anime en una lista
                    foreach ($anime["genres"] as $genero) {
                        echo "<ul style='list-style:none'>";
                        echo "<li>" . $genero["name"] . "</li>";
                        echo "</ul>";
                    }
                ?>
                </td>
                <td>
                <?php 
                    // Mostrar productoras en una lista
                    foreach ($anime["producers"] as $productora) {
                        echo "<ul style='list-style:none'>";
                        echo "<li>" . $productora["name"] . "</li>";
                        echo "</ul>";
                    }
                ?>
                </td>
                <td>
                    <img src="<?php echo $anime['images']['webp']['image_url'] ?>" alt="Imagen del Anime">
                </td>
                <td><?php echo $anime["year"] ?></td>
                <td>
                    <iframe width="300" height="350" src="<?php echo $anime["trailer"]["embed_url"]?>"></iframe>
                </td>
                <td>
                <?php 
                    // Mostrar animes relacionados si son del tipo "anime"
                    foreach ($anime["relations"] as $relacion) {
                        foreach ($relacion["entry"] as $entry) { 
                            if ($entry["type"] == "anime") {
                                echo "<ul style='list-style:none'>";
                                echo "<li>" . $entry["name"] . "</li>";
                                echo "</ul>";
                            }
                        }
                    }
                ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
