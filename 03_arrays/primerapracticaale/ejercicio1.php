<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>

</body>
<?php
    $personajes  = [
        ["kokomi", "agua ",34084,"tanque"],
        ["neuvillete", "agua",210001,"tanque"],
        ["zhongli", "tierra",16753,"soporte"],
        ["hu tao", "fuego",18972,"ataque"],
        ["shogun raiden","electricidad",14086,"soporte"],
    ];
?>
  <?php
    array_push($personajes,["mario bross","tierra",18321,"tanque"]);
    array_push($personajes,["pac man","aire",2893,"tanque"]);


    unset($personajes[4]);
   

    $personajes=array_value($personajes);


    $personajes[$i][2]=rand(500,2000);
    $personajes[$i][3]=rand(10000,30000);
    $personajes[$i][4];

    for ($i=0; $i<$count($personajes); $i++) { 
      
        if($personajes[$i][4] => 20000){
            $personajes[$i][4] = "tanque";
           else if($personajes[$i][4] => 1500){
                $personajes[$i][4] = "ataque"; 
             }elseif( $personajes[$i][4] ){
            $personajes[$i][4] = "soporte";
    }
}
    } 
    ?>

    <h3>mostrar las linea de latabla </h3>
    <table>
        <thead>
            <tr>
                <th>nombre</th>
                <th>elemnto</th>
                <th>ataque</th>
                <th>salud</th>
                <th>tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
    $_puntoataque = array_column($personajes,2);
    $_puntosalud = array_column($personajes,3);
    $_elemento = array_column($personajes,1);
    $_nombre = array_column($personajes,0);
    // array_multisort($_puntoataque, SORT_ASC, $videojuegos);//
    foreach($personajes as $personaje) {
        list($nombre, $elemento, $ataque,$salud,$tipo) = $peronaje;
        echo "<tr>";
        echo "<td>$nombre</td>";
        echo "<td>$elemento</td>";
        echo "<td>$ataque</td>";
        echo "<td>$salud</td>";
        echo "<td>$tipo</td>";
        echo "</tr>";
    }
    ?>
</tbody>
</table>
        

   


</html>