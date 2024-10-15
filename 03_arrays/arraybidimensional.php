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
            /*meto juego nuevo*/
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
       <!--------------------------------------------------------------------------->

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
                    $autobuses[$i][3] = "PAGO";
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
        </tbody>
    </table>

</body>
</html>