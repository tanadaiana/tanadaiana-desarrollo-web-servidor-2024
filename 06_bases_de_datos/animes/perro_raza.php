<!--/**

La Dog API nos ofrece imágenes aleatorias de diferentes perritos.

Ejercicio 2: Crea una página llamada perrito_raza.php que nos muestre un
perrito al azar de la raza escogida. La raza se escogerá mediante un campo
de tipo select. ¡Ten cuidado con la forma de mostrar las razas en el
desplegable, tiene truco!

*/-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            background-color: lightgreen;
        }
        .formulario {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;

        }
        select,
        input {
            font-size: 25px;
            height: 80px;
            width: 300px;
        }

        img {
            max-width: 1000px;
            max-height: 1000px;
        }

        select {
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    $url = "https://dog.ceo/api/breeds/list/all";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $razas = $datos;

    ?>


    <?php
    //saco imagen del perro seleccionado
    if (isset($_GET["perro"])) {
        $imagen = "";
        $_perro = $_GET["perro"];

        $url_imagen = "https://dog.ceo/api/breed/$_perro/images/random";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url_imagen);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $imagen = $datos;

        ?>


    <?php } ?>



    <div class="formulario">
        <form action="" method="get">
            <select name="perro" id="">
                <?php foreach ($razas["message"] as $raza => $subraza) {
                    if (empty($subraza)) {
                        echo "<option value='$raza'>" . ucfirst($raza) . "</option>";
                    } else {
                        foreach ($subraza as $subrazas) {
                            echo "<option value='$raza/$subrazas'>" . ucfirst($raza) . " " . ucfirst($subrazas) . "</option>";
                        }
                    }
                } ?>
            </select>
            <input type="submit" value="Mostrar">
            <br><br>

            <?php if (isset($imagen)) { ?>
                <img src="<?php echo $imagen["message"] ?>" alt="No se encuentra la imagen">
            <?php } ?>

        </form>
    </div>
</body>

</html>