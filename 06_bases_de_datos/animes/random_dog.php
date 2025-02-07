<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Dog</title>
</head>
<body>
    <h2>Imagen aleatoria de un perro</h2>
    <?php
        $apiUrl = "https://dog.ceo/api/breeds/image/random";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $array = json_decode($response, TRUE); 

        if (isset($array['message'])) {
            $imagen = $array['message'];
            echo "<img src='$imagen' alt='Imagen de un perro' style='max-width: 300px; display: block; margin-bottom: 20px;'>";
        } else {
            echo "<p>Error al obtener la imagen.</p>";
        }
    ?>
    
    <!-- Botón en formato HTML tradicional -->
    <form method="post">
        <button type="submit">Obtener otra imagen</button>
    </form>

</body>
</html>