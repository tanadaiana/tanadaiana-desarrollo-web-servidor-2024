<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
   
    <?php
        // Muestra todos los errores para depuración
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
 
</head>
<body>
    <?php
        // Verifica si 'type' está definido en la URL
        if (isset($_GET["type"])) {
            // Evalúa el valor de 'type' y asigna a $tipo
            if ($_GET["type"] == "") $tipo = "";
            else if ($_GET["type"] == "tv") $tipo = "tv";
            else if ($_GET["type"] == "movie") $tipo = "movie"; 
        } else {
            $tipo = ""; // Si no está definido, por defecto es vacío (todos los tipos)
        }

        // Verifica si 'page' está definido, si no, se asigna la página 1
        $pagina = isset($_GET["page"]) ? $_GET["page"] : 1;
        
        // Construcción de la URL de la API con los parámetros obtenidos
        $url = "https://api.jikan.moe/v4/top/anime?page=$pagina&type=$tipo";
        
        // Inicialización de cURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // Se pasa la URL de la API
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Se indica que debe devolver la respuesta en lugar de mostrarla
        $respuesta = curl_exec($curl); // Se ejecuta la petición a la API
        curl_close($curl); // Se cierra la conexión cURL

        // Se decodifica la respuesta JSON en un array PHP
        $datos = json_decode($respuesta, true);
        $animes = $datos["data"]; // Se extrae la sección "data" con la información de los animes
    ?>
    <div class="container">
        <h1>TOP ANIME</h1>
        <form action="" method="get">
            <div >            
                <div >
                    <input type="radio" name="type" value=""> Todo <!-- Mostrar todos los tipos -->
                </div>
                <div >
                    <input type="radio" name="type" value="tv"> Serie de TV <!-- Solo series -->
                </div>
                <div >
                    <input type="radio" name="type" value="movie"> Películas <!-- Solo películas -->
                </div>
                <div >
                    <input type="submit" value="Filtrar" class="btn">
                </div>                       
            </div>
        </form> 
        
        <table>
            <thead>
                <tr>
                    <th >Rank</th>
                    <th >Título</th>
                    <th >Nota</th>
                    <th >Imagen</th>
                    <th >Ver más información</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Iteración sobre la lista de animes obtenidos de la API
                    foreach($animes as $anime) { ?>
                        <tr>
                            <td><?php echo $anime["rank"] ?></td> <!-- Muestra el ranking -->
                            <td><?php echo $anime["title"] ?></td> <!-- Muestra el título -->
                            <td><?php echo $anime["score"] ?></td> <!-- Muestra la puntuación -->
                            <td>
                                <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
                            </td> <!-- Muestra la imagen -->
                            <td>
                                <a class="btn" href="anime.php?mal_id=<?php echo $anime['mal_id'] ?>&page=<?php echo $pagina ?>&type=<?php echo $tipo ?>">Enlace</a>
                            </td> <!-- Enlace a más información -->
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php        
        // Se calculan las páginas anterior y siguiente
        $siguiente = $pagina + 1;
        $anterior = $pagina - 1;
    ?>
    <div class="pagination">
        <?php 
        // Solo muestra el botón "Anterior" si no estamos en la página 1
        if ($anterior != 0) {?>
            <a href="top_anime.php?page=<?php echo $anterior ?>&type=<?php echo $tipo ?>">Anterior</a>
            <a href="top_anime.php?page=<?php echo $siguiente ?>&type=<?php echo $tipo ?>">Siguiente</a>
        <?php } else { ?>  
            <a href="top_anime.php?page=<?php echo $siguiente ?>&type=<?php echo $tipo ?>">Siguiente</a>
        <?php } ?>
    </div>
</body>
</html>