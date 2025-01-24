<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $url = "http://localhost/Ejercicios/06_bases_de_datos/animes/api/api_estudios.php";
        if(!empty($_GET["ciudad"])) {
            $ciudad = $_GET["ciudad"];
            $url = $url . "?ciudad=$ciudad";
        }
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $estudios = json_decode($respuesta, true);
    ?>
    
</body>
</html>