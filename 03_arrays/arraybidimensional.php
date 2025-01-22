<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "ejemplo-Styles.css" rel = "stylesheet">
    <title>Arrays bidimensionales</title>

    <!--Fuerzo con este codigo para que salga el error-->
<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>

</head>
<body>
    <?php
    $videojuegos = [
        ["FIFA 24", "Deporte", 70],
        ["Dark souls", "Soulslike", 50],
        ["Hollow Knight", "Plataformas", 30],
    ];

    foreach($videojuegos as $videojuego) {
        list($titulo, $categoria, $precio)= $videojuego;
        echo "<p>$titulo,$categoria,$precio</p>";
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             <?php
             foreach($videojuegos as $videojuego) {
                 list($titulo, $categoria, $precio) = $videojuego;
                 echo "<tr><td>$titulo</td><td>$categoria</td><td>$precio</td></tr>";
             }
             ?>
             </tbody>
             </table>
             <br><br>
             ---------------------------------------
            /*meto juego nuevo
            $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
            array_push($videojuegos, $nuevo_videojuego);

            foreach($videojuegos as $videojuego) {
                list($titulo, $categoria, $precio) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
*/


  <!--------------------------------------------------------------------------->

        <!--EJERCICIOS DE PRUEBA-->
        <!--ORDENAR ARRAYS BIDIMENSIONALES-->
        <h3>Ordenar Array bidimensionales Precio mas barato a precio mas caro</h3>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 

            //Ejercicio rapido 1: Ordenar por el precio de mas BARATO a mas CARO
            $_precio = array_column($videojuegos,2);
            array_multisort($_precio, SORT_ASC, $videojuegos);
            foreach($videojuegos as $videojuego) {
                list($titulo, $categoria, $precio) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
        <!--------------------------------------------------------------------------->
        <h2>Añadiendo elemento al array/tabla</h2>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
            array_push($videojuegos, $nuevo_videojuego);
            foreach($videojuegos as $videojuego) {
                list($titulo, $categoria, $precio) = $videojuego;
                echo "<tr><td>$titulo</td><td>$categoria</td><td>$precio</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <br><br>
        -------------------------------------------

    <h3>Ordenar Array bidimensionales Por categoria en orden alfabetico</h3>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //Ejercicio rapido 2: Ordenar por CATEGORIA en orden alfabetico-->
            $_categoria = array_column($videojuegos,1);
            array_multisort($_categoria, SORT_DESC, $videojuegos);

            foreach($videojuegos as $videojuego) {
                list($titulo, $categoria, $precio) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    ---------------------
    
    <h2>Ordenando a partir de una columna</h2>
    <?php
    $nuevo_videojuego = ["Final Fantasy VII", "Rol", 15];
        array_push($videojuegos, $nuevo_videojuego);

        //se suele utilizar la barra baja para indicar que es una variable "temporal"
        $_titulo = array_column($videojuegos, 0); //se coge el array en vez de a lo largo (por fila) a lo ancho (por columnas)
        array_multisort($_titulo, SORT_ASC, $videojuegos); //columna, asc/desc, array a ordenar
        //SORT_ASC para orden ascendiente
        //SORT_DESC para orden descendiente
    ?>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        foreach($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<tr><td>$titulo</td><td>$categoria</td><td>$precio</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <br><br>


       <!----------------------------------para saber si el videojuego es gratis o de pago agrego columna 3----------------------------------------->

       <h3>Miro si el juego es gratis o de pago</h3>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            for($i = 0; $i < count($videojuegos); $i++){
                if($videojuegos[$i][2] == 0){
                    $videojuegos[$i][3] = "GRATIS";
                }elseif( $videojuegos[$i][2] > 0){
                    $videojuegos[$i][3] = "PAGO";
                }
            }

            foreach($videojuegos as $videojuego) {
                list($titulo, $categoria, $precio, $estado) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "<td>$estado</td>";
                echo "</tr>";
            }
            ?>
            ----------------------       <?php
            $autobuses = [
                ["Málaga", "Ronda", 90, 10],
                ["Churriana", "Málaga", 20, 3],
                ["Málaga", "Granada", 120, 15],
                ["Torremolinos", "Málaga", 30, 3.5]
            ];
            ?>
        
            <!--
                Ejercicio 1: añadir dos lineas de autobús
                Ejercicio 2: ordenar por duración, de más a menos.
                Ejercicio 3: mostrar las líneas en una tabla.
            -->
        
            <?php
            array_push($autobuses, ["Málaga", "Madrid", 300, 20]); //No hace falta variable intermediaria para meter el array
            array_push($autobuses, ["Cádiz", "Málaga", 120, 7]);
            //array_multisort(array_column($autobuses, 2), SORT_DESC, $autobuses);
            
    //$_origen = array_column($autobuses, 0);
    //$_destino = array_column($autobuses, 1);
    //array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC);
            ?>
        
            foreach ($autobuses as $autobus) {
                list ($origen, $destino, $duracion, $precio) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$duracion</td>";
                echo "<td>$precio</td>";
                if ($duracion <= 30) $tipo = "Corta distancia";
                else if ($duracion > 30 && $duracion <= 120) $tipo = "Media distancia";
                else if ($duracion > 120) $tipo = "Larga distancia";
                echo "<td>$tipo</td>";
                echo "</tr>";
            }
            <?php

            /*
                    Si duracion <= 30, corta distancia
                    Si duracion > 30 y <= 120, media distancia
                    Si duracion > 120, larga distancia
            */
        
            for ($i = 0; $i < count($autobuses); $i++) { //el count va a devolver cuantos arrays tiene dentro
                //$autobuses[$i][4] = "X";
                /*if ($autobuses[i][2] <= 30) {
                    $autobuses[i][4] = "Corta distancia"; //También se puede rellenar aquí mismo.
                }*/
            }
           
            //print_r($autobuses);
            ?>
            ?>
        </tbody>
    </table>

</body>
</html>