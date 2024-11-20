<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php
//declaro el array
    $autobuses=[
        ["malaga","ronda",90,10],
        ["churriana","malaga", 20],3,
        ["torremolinos","malaga", 30,3.5],
    ];

    //añado dos filas nuevas a mi array

    array_push($autobuses,["malaga","cordoba",5,20]);
    array_push($autobuses,["malaga","barcelona",885,28]);


    //ordenar por duracion de mas duracion a menos 

    $_aux=array_column($autobuses,2);
    array_multisort($_aux,SORT_DESC,$autobuses);



    //MOSTRAR LAS LINEAS EN UNA TABLA 
    ?>
    <table>
    <thead>
        <tr>
            <th>origen</th>
            <th>destino</th>
            <th>duracion</th>
            <th>precio</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $_origen=array_column($autobuses,0);
        $_duracion=array_column($autobuses,2);
    array_multisort($_origen,SORT_ASC, $_duracion, SORT_ASC ,$autobuses );//te ordena con una variable auxiliar la tabla 


//inserrtar autobus 
    array_push($autobuses,["valencia ","malaga",5,20]);
    array_push($autobuses,["valencia","barcelona",885,28]);


//ordenar primero por el origen,luego por el destino
    $_origen=array_column($autobuses,0);
    $_destino=array_column($autobuses,1);
array_multisort($_origen,SORT_ASC, $_duracion, SORT_ASC ,$_precio,SORT_ASC,$autobuses );


//orden primero por duracion ,luego por precio 
$_duracion=array_column($autobuses,2);
$_precio=array_column($autobuses,3);
array_multisort($_duracion,SORT_ASC, $_precio, SORT_ASC ,$autobuses );


        foreach ($autobuses as $autobus) {
            list($origen,$destino,$duracion,$precio)=$autobus;
           echo  "<tr>";
            echo "<td>$origen</td>";
            echo "<td>$destino</td>";
            echo "<td>$duracion</td>";
            echo "<td>$precio</td>";
            echo "</tr>";
        } 



        for ($i=0; $i<$count($autobuses); $i++) { 
        $autobuses[$i][4]="x";
        }
        <table>
        <thead>
            print_r($autobuses);
        foreach ($autobuses as $autobus) {


            //if($autobuses[i][4]="x");
            if($autobuses[i][4]=30){
                $autobuses[$i][4]=30;


            }

        list($origen,$destino,$duracion,$precio,$distancia)=$autobus;
       echo  "<tr>";
        echo "<td>$origen</td>";
        echo "<td>$destino</td>";
        echo "<td>$duracion</td>";
        echo "<td>$precio</td>";
        echo "<td>$distancia</td>";
        echo "</tr>";
    } 
   >?
    <tbody>
    </thead>

</body>
</html>