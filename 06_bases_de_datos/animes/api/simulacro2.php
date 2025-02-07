<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos de Shiba Inu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    // Código para mostrar errores
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
    <style>
        .table-primary {
            --bs-table-color-state: green;
            --bs-table-bg: beige;
        }
    </style>
</head>
<body>
   
    <?php
        $imagenes = [];
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $cantidad = $_GET["cantidad"] ?? 0;

            if ($cantidad > 0 && $cantidad <= 10) {
                $url = "https://shibe.online/api/shibes?count=$cantidad";

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $imagenes = json_decode($respuesta, true);
            } else {
                $err = "Por favor, selecciona un número entre 1 y 10.";
            }
        }
    ?>
    
    <div class="container">
        <form action="" method="get" enctype="">
            <div class="mb-3">
                <label for="" class="form-label">Cantidad de Fotos</label>
                <select name="cantidad" class="form-select">
                    <option value="" selected disabled hidden>--- Elige Cantidad ---</option>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Solicitar">
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
        
        <?php if (isset($err)) echo "<span class='error'>$err</span>"; ?>

        <div class="row">
            <?php foreach ($imagenes as $imagen): ?>
                <div class="col-md-4 mb-3">
                    <img src="<?php echo $imagen; ?>" alt="Shiba Inu" class="img-fluid rounded">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>