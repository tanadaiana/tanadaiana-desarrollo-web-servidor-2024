<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<?php
    if(!isset($_GET["id"])) {
        header("location: top_animes.php"); 
        echo "<p>Falta el parámetro ID. Por favor, proporciona un ID de personaje en la URL, por ejemplo: ?id=1</p>";
    }
    $id = $_GET["id"];
    $url = "https://api.jikan.moe/v4/anime/$id/full";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $anime = $datos["data"];
    "<p>No se encontraron datos para el ID proporcionado.</p>";
    ?>
    <h1>
        <?php echo $anime["title"] ?>
    </h1>

    <img width="200px" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
    <h2>Estudio</h2>
    <?php foreach($datos as $anime){ ?>
        <?php foreach($anime["studios"] as $studio){ ?>
            
               <?php echo $studio["name"]; ?> 
            
        <?php } ?>
    <?php } ?>
    <h2>Género</h2>
    <?php foreach($datos as $anime){ ?>
        <?php foreach($anime["genres"] as $genre){ ?>
            
               <?php echo $genre["name"]; ?> 
            
        <?php } ?>
    <?php } ?>
    <h2>Productoras</h2>
    <?php foreach($datos as $anime){ ?>
        <?php foreach($anime["producers"] as $producer){ ?>
            
               <?php echo $producer["name"]; ?> 
            
        <?php } ?>
    <?php } ?>
    <h2>Sinopsis</h2>
    <p>
        <?php echo $anime["synopsis"] ?>
    </p>

    <h2>Tráiler</h2>
    <iframe src="<?php echo $anime["trailer"]["embed_url"] ?>"></iframe>
</body>
</html>
---------------------------------------<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
<?php
    // Verifica si el parámetro "id" está presente en la URL
    if (!isset($_GET["id"])) {
        echo "<p>Error: Falta el parámetro ID. Por favor, proporciona un ID de anime en la URL, por ejemplo: ?id=1</p>";
        exit; // Detiene la ejecución del script
    }

    // Extrae el ID del anime
    $id = $_GET["id"];
    $url = "https://api.jikan.moe/v4/anime/$id/full";

    // Inicializa cURL y configura la solicitud
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    // Decodifica la respuesta JSON
    $datos = json_decode($respuesta, true);

    // Verifica si los datos del anime son válidos
    if (!isset($datos["data"])) {
        echo "<p>Error: No se encontraron datos para el ID proporcionado.</p>";
        exit; // Detiene la ejecución del script
    }

    // Extrae los datos del anime
    $anime = $datos["data"];
?>

    <!-- Mostrar el título del anime -->
    <h1><?php echo htmlspecialchars($anime["title"]); ?></h1>

    <!-- Mostrar la imagen del anime -->
    <img width="200px" src="<?php echo htmlspecialchars($anime["images"]["jpg"]["image_url"]); ?>" alt="Imagen del anime">

    <!-- Mostrar estudios -->
    <h2>Estudio</h2>
    <ul>
        <?php foreach ($anime["studios"] as $studio) { ?>
            <li><?php echo htmlspecialchars($studio["name"]); ?></li>
        <?php } ?>
    </ul>

    <!-- Mostrar géneros -->
    <h2>Géneros</h2>
    <ul>
        <?php foreach ($anime["genres"] as $genre) { ?>
            <li><?php echo htmlspecialchars($genre["name"]); ?></li>
        <?php } ?>
    </ul>

    <!-- Mostrar productoras -->
    <h2>Productoras</h2>
    <ul>
        <?php foreach ($anime["producers"] as $producer) { ?>
            <li><?php echo htmlspecialchars($producer["name"]); ?></li>
        <?php } ?>
    </ul>

    <!-- Mostrar sinopsis -->
    <h2>Sinopsis</h2>
    <p><?php echo nl2br(htmlspecialchars($anime["synopsis"])); ?></p>

    <!-- Mostrar tráiler -->
    <?php if (isset($anime["trailer"]["embed_url"])) { ?>
        <h2>Tráiler</h2>
        <iframe width="560" height="315" src="<?php echo htmlspecialchars($anime["trailer"]["embed_url"]); ?>" frameborder="0" allowfullscreen></iframe>
    <?php } else { ?>
        <p>No hay tráiler disponible para este anime.</p>
    <?php } ?>

</body>
</html>
<!--http://localhost/anime.php?id=1-->