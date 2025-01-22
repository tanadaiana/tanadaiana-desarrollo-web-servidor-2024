<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "ejemplo-Styles.css" rel = "stylesheet">
    <title>Autobuses</title>
</head>
<body>
    <h2>Ejemplo de arrays bidimensionales con autobuses</h2>
    <?php
      $autobuses = [
        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3], 
        ["Torremolinos", "Málaga", 30, 3.5],
    ];
        /*
        *Ejercicio 1: Añadir dos lineas de autobús
        *
        *Ejercicio 2: Ordenar por duración a menos
        *
        *Ejercico 3: Mostrar las lineas en una tabla
        */
     ?>
     <!--PRIMERISIMO CREO LA TABLA FUERA DEL PHP-->
    <!-- MOSTRAR LAS LINEAS EN UNA TABLA -->

    <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tiempo de Trayecto (min)</th>
                <th>Precio de trayecto (€)</th>
            </tr>
        </thead> 
        
    <!--AHORA AQUI ABRO EL TBODY Y METO EL PHP-->
    <tbody>
        <?php 
 
            //creo un foreach de autobuses
            foreach($autobuses as $autobus){
                list($origen, $destino, $tiempoTrayecto, $precioTrayecto) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$tiempoTrayecto</td>";
                echo "<td>$precioTrayecto</td>";
                echo "</tr>";
            }
           
        ?>
    </tbody>
     </table>

    <!--------------------------------------------------------------------------->

     <h3>Añadir un nuevo autobus</h3>
      <!--PRIMERISIMO CREO LA TABLA FUERA DEL PHP-->
      <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tiempo de Trayecto (min)</th>
                <th>Precio de trayecto (€)</th>
            </tr>
        </thead>
    <!--AHORA AQUI ABRO EL TBODY Y METO EL PHP-->
    <tbody>
        <?php 
        
             //Ejercicio 1: Añadir dos lineas de autobús
             $nuevo_autobus = ["Málaga", "Madrid", 360, 17.5];
             array_push($autobuses, $nuevo_autobus);

 
            //creo un foreach de autobuses
            foreach($autobuses as $autobus){
                list($origen, $destino, $tiempoTrayecto, $precioTrayecto) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$tiempoTrayecto</td>";
                echo "<td>$precioTrayecto</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
     </table>
     <!--------------------------------------------------------------------------->

     <h3>Ordenar por menor duración</h3>
      <!--PRIMERISIMO CREO LA TABLA FUERA DEL PHP-->
      <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tiempo de Trayecto (min)</th>
                <th>Precio de trayecto (€)</th>
            </tr>
        </thead>
    <!--AHORA AQUI ABRO EL TBODY Y METO EL PHP-->
    <tbody>
        <?php 
        
            //Ejercicio 2: Ordenar por duración a menos
 
            //creo un foreach de autobuses
            foreach($autobuses as $autobus){
                list($origen, $destino, $tiempoTrayecto, $precioTrayecto) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$tiempoTrayecto</td>";
                echo "<td>$precioTrayecto</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
     </table>
     <!--------------------------------------------------------------------------->

     <h3>Ordenar por origen</h3>
      <!--PRIMERISIMO CREO LA TABLA FUERA DEL PHP-->
      <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tiempo de Trayecto (min)</th>
                <th>Precio de trayecto (€)</th>
            </tr>
        </thead>
    <!--AHORA AQUI ABRO EL TBODY Y METO EL PHP-->
    <tbody>
        <?php 
        
            //Aqui lo ordeno por el origen
            $_origen = array_column($autobuses, 0);
            array_multisort($_origen, SORT_ASC, $autobuses);//el multisort actualiza las claves por que es un array asociativo
 
            //creo un foreach de autobuses
            foreach($autobuses as $autobus){
                list($origen, $destino, $tiempoTrayecto, $precioTrayecto) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$tiempoTrayecto</td>";
                echo "<td>$precioTrayecto</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
     </table>
     <!--------------------------------------------------------------------------->

     <!--
      /**
     *Ejercicio 4: Insertar 3 autobuses más
     *
     *Ejercicio 5: Ordenar, primero por el origen, luego por el destino
     array_multisort
     *
     *Ejercicio 6: Ordenar, primero por la duracion, luego por el precio
      */
     --->

    <!--------------------------------------------------------------------------->
    <h3>Incluir 3 nuevos autobus y Ordenar, primero por el origen, luego por el destino </h3>
      <!--PRIMERISIMO CREO LA TABLA FUERA DEL PHP-->
      <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tiempo de Trayecto (min)</th>
                <th>Precio de trayecto (€)</th>
            </tr>
        </thead>
    <!--AHORA AQUI ABRO EL TBODY Y METO EL PHP-->
    <tbody>
        <?php 
            //Ejercicio 4: Insertar 3 autobuses más
            $nuevo_autobus = ["Madrid", "Pastrana", 45, 10];
            array_push($autobuses, $nuevo_autobus);

            $nuevo_autobus = ["Toledo", "Pastrana", 145, 20];
            array_push($autobuses, $nuevo_autobus);

            $nuevo_autobus = ["Málaga", "Yebra", 350, 20];
            array_push($autobuses, $nuevo_autobus);

            //COMO BORRAR UNA FILA
            //unset($autobuses[1];) => me acrgo la fila entera
            

            //borra y reordenar con el value

            unset($frutas3[1]); //Elimina el cajon 1.
            $frutas3 = array_values($frutas3);
        


 
            //creo un foreach de autobuses
            foreach($autobuses as $autobus){
                list($origen, $destino, $tiempoTrayecto, $precioTrayecto) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$tiempoTrayecto</td>";
                echo "<td>$precioTrayecto</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
     </table>

        <!--HACER UNA TABLA CON UNA COLUMNA MAS-->
            <h2>Añadir una columna</h2>

      <table>
        <caption>Linea de autobuses</caption>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tiempo de Trayecto (min)</th>
                <th>Precio de trayecto (€)</th>
                <th>Tipo</th>
            </tr>
        </thead>
      <tbody>
        <?php 
         //A cada fila le asigna una X en la columna 4
         for($i = 0; $i < count($autobuses); $i++){
            //$autobuses[$i][4] = "X";
            if($autobuses[$i][2] <= 30){
                $autobuses[$i][4] = "Corta distancia";
            }elseif( $autobuses[$i][2] > 30 &&  $autobuses[$i][2] <= 120){
                $autobuses[$i][4] = "Media distancia";
            }elseif( $autobuses[$i][2] > 120){
                $autobuses[$i][4] = "Larga distancia";
            }
        }

        /**
         * Si duracion <= 30 corta distancia
         * Si duracion > 30 y <= 120 Media distancia
         * Si duracion > 10 larga distancia
         */

        //print_r($autobuses);

        //creo un foreach de autobuses
        foreach($autobuses as $autobus){
            list($origen, $destino, $tiempoTrayecto, $precioTrayecto, $tipo) = $autobus;
            echo "<tr>";
            echo "<td>$origen</td>";
            echo "<td>$destino</td>";
            echo "<td>$tiempoTrayecto</td>";
            echo "<td>$precioTrayecto</td>";
            echo "<td>$tipo</td>";
            echo "</tr>";
        }

        ?>
      </tbody>
      </table>

</body>
</html>