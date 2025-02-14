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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dragon ball</title>
    <link rel="stylesheet" href="./CSS/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Busca Personajes de dragon ball</h1>
        
        <form action="" method="get">
            <label for="cantidad">Cantidad de personajes:</label>
            <input type="number" id="cantidad" name="cantidad" min="0" max="5" placeholder="Nº de personajes" >
            
            <label for="gender">Género:</label> 
            <select name="gender" id="gender" >
                <option disabled selected hidden></option>
                <option value="Male">Male</option>
                <option value="femenle">femenle</option>
                <option value="Unknown">Unknown</option>
              
            </select>
            
            <label for="species">race:</label> 
            <select name="species" id="species" required>
                <option disabled selected hidden></option>
                <option value="Frieza Race">Frieza Race</option>
                <option value="Frieza Race">Frieza Race</option>
                <option value="Frieza Race">Frieza Race</option>
                <option value="Android">Android</option>
                <option value="Saiyan">Saiyan</option>
               
            </select>
            
            <button type="submit">Buscar</button>
        </form>

        <?php
        if (isset($_GET["cantidad"]) && isset($_GET["gender"]) && isset($_GET["race"])) {
            $cant = intval($_GET["cantidad"]);
            $genero = $_GET["gender"];
            $especie = $_GET["race"];


            $apiUrl = "https://dragonball-api.com/api/characters";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);
            $personajes = array_slice($datos["results"], 0, $cant);//0 es donde empieza y $cant lo que esta ingresado en el input
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>raza</th>
                    <th>genero</th>
                    <th>Imagen</th>
                    <th>descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personajes as $personaje) { ?>
                <tr>
                    <td><?php echo ($personaje["name"]); ?></td>
                    <td><?php echo ($personaje["race"]); ?></td>
                    <td><?php echo ($personaje["gender"]); ?></td>
                    <td><?php echo ($personaje["descripcion"]); ?></td>
                  
                    
                    <td>
                        <img width="100px" src="<?php echo ($personaje["image"]); ?>">
                        <?php  foreach ($animes as $anime) { ?>
           

        <?php } ?>
        <?php  foreach ($animes as $anime) { ?>
          
        <?php } ?>


                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        } 
        ?>
    </div>
</body>
</html>