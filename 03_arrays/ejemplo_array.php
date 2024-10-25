<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "ejemplo-estilo.css" rel = "stylesheet">
    <title>Ejemplos</title>

<!--Fuerzo con este codigo para que salga el error-->
<?php
    /*error_reporting( E_ALL );
    ini_set( "display_errors", 1 );*/
    ?>
</head>
<body>

<?php
//Sintasix de un array en php*/
/*$frutas = array(
    1 => "Manzana",//los numeros son las claves
    2 => "Naranja",
    3 => "Cereza"
);
array_push($frutas,"Sandia","Melón");

//array_values -> machaca las claves y crea nuevas
$frutas = array_values($frutas);

//unset mata lo que hya en esa casillas pero no se reordenan los elementos
unset($frutas[1]);

print_r($frutas);


/*$frutas = array(
    "Manzana",//Se puede poner asi pero asigna automaticamente desde el 0 hata la que sea
    "Naranja",
    "Cereza"
);*/
//para mostrarlo entero
//print_r($frutas);

//para mostrar uno de los cajones
//echo $frutas[0];
?>

<?php
//EJERCICIO EJEMPLO_01 
/*CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA EL DNI Y EL VALOR EL NOMBRE
  QUE HAYA MINIMO 3 PERSONAS
  MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL
  
  *AÑADIR ELEMENTOS CON Y SIN CLAVE
  
  *BORRAR ALGUN ELEMENTO
  
  *PROBAR A RESETEAR LAS CLAVES*/

  /*$personas = array(
    "23456789E" => "Estela",
    "67854567L" => "Luis",
    "09875678A" => "Angel",
    "08976875E" => "Emilio"
  );

//Para añadir una persona con clave y nombre
$personas ["98767876L"] = "Alejandra";

//para agregar elementos con la funcion push
array_push($personas, "Gatito 'Miau miau'");//en la clave hay un 0

//para borrar un elemento
unset($persona[0]);
print_r($personas);//para mostrar el array

//La FUNCION COUNT --> permite contar los elementos
$tamanio = count($personas);
echo "<h3>$tamanio</h3>";*/

//VOLVEMOS A COJER EL ARRAY DE FRUTAS

   
echo "<h3>Comparaciones de ARRAYS</h3>";
    //COMPARACIONES DE ARRAYS
    $frutas2 = array(
      "Melocotón",
      "Fresa",
      "Albaricoque"
    );
    if($frutas == $frutas2) {
      echo "<h3>Los arrays son iguales</h3>";
    }else{
      echo "<h3>Los arrays no son iguales</h3>";
    }

echo "-----------------------------------------";

$numero1 = [1,2,3,4,5,6];
$numero2 = ["1","2","3","5","6"];

if($numero1 === $numeros2){
  echo "<h3>Los arrays son iguales</h3>";
}else{
  echo "<h3>Los arrays no son iguales</h3>";
}

$frutas = array(
  "Manzana",
  "Naranja",
  "Cereza"
);

echo "<h3> Mis frutas con FOR </h3>";

echo "<ol>";
for($i = 0; $i < count($frutas); $i++){
  echo "<li>" . $frutas[$i] . "</li>";
}
echo "</ol>";

echo "----------------------------------";

echo "<h3> Mis frutas con WHILE </h3>";

echo "<ol>";
$i = 0;
while($i < count($frutas)){
  echo "<li>" . $frutas[$i] . "</li>";
  $i++;
}
echo "</ol>";

echo "----------------------------------";

echo "<h3> Mis frutas con FOREACH </h3>";


echo "<ol>";
foreach($frutas as $fruta){
  echo "<li>$frutas</li>";
}
echo "</ol>";

echo"-------------------------------------";

echo "<h3> Mis frutas con FOREACH con clave </h3>";

echo "<ol>";
foreach($frutas as $clave => $fruta){
  echo "<li>$clave,$fruta</li>";
}
echo "</ol>";



echo"-------------------------------------";

//Sacar la clave y el valor del array de personas sacarlo en una tabla
/*echo "<table>";
foreach($frutas as $clave => $fruta){
  echo "<li>$clave,$fruta</li>";
}
echo "</table>";*/

echo "<h3> Mi Tabla con FOREACH </h3>";
?>
</style>
<table>
  <thead>
    <tr>
      <th>Clave</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($frutas as $clave => $fruta){
      echo "<tr>";
      echo"<td>$clave</td>";
      echo"<td>$fruta</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
</body>
</html>


<!--------------------------------------------------->
<!--abro1-->
<?php
echo "<h3> Mi Tabla con FOREACH RARETE </h3>";?><!--cierro1-->

<table>
  <thead>
    <tr>
      <th>Clave</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <!--abro2-->
    <?php
    foreach($frutas as $clave => $fruta){?>
      <tr>
      <td><?php echo $clave?></td>
      <td><?php echo $fruta?></td>
      </tr>
      <?php
    }?><!--cierro2-->
    
  </tbody>
</table>

<?php

echo "<h3> Mi Tabla Buena</h3>";
//metodos de arrays
/**arsort = aociative reverse sort
 * rsort = reverse sort
 * asort = asociative sort
 */

 //Array de personas con valor y clave 
 $personas = array(
  "23456789E" => "Estela",
  "67854567L" => "Luis",
  "09875678A" => "Angel",
  "08976875E" => "Emilio"
);
?>
<table>
  <thead>
    <tr>
      <th>Clave</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php
    sort($personas);
    foreach($personas as $clave => $persona){
      echo "<tr>";
      echo"<td>$clave</td>";
      echo"<td>$persona</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

  <!-----
  Desarrollo web servidor => Alejandra
  Desarrollo web cliente => Jaime
  Diseño de Interfaces => Jose
  Despliegue de aplicaciones web => Alejandro
  Empresa e iniciativa emprendedora => Gloria
  Inglés => Virginia

  Mostrar en una tabla las asignaturas y sus respectivos profesores

  Luego:
  Mostrar una tabla adicional ordenanda por la aignatura en orden alfabetico

  Mostrar una tabla adicional ordenada por los profesores en orden alfabetico inverso
  -->
  <h3>------------------------------------------------</h3>
  <?php

  $profesores = array (
    "Desarrollo web servidor" => "Alejandra",
    "Desarrollo web cliente" => "Jaime",
    "Diseño de Interfaces" => "Jose",
    "Despliegue de aplicaciones web" => "Alejandro",
    "Empresa e iniciativa emprendedora" => "Gloria",
    "Inglés" => "Virginia"
  );
  ?>
  <h3>Tabla de profesores ordenada por asignatura en orden alfabetico</h3>
  <!--FUERA DE LA ETIQUETA PHP-->
  <table>
  <thead>
    <tr>
      <th>Asignatura</th>
      <th>Profes</th>
    </tr>
  </thead>
  <tbody>
    <?php

    asort($profesores);//ordena alfabeticamente

    foreach($profesores as $Asignatura => $profesor){
      echo "<tr>";
      echo "<td>$Asignatura</td>";
      echo "<td>$profesor</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
<h3>------------------------------------------------</h3>
<h3>Tabla de profesores ordenada por profesor en orden alfabetico inverso</h3>
<table>
  <thead>
    <tr>
      <th>Asignatura</th>
      <th>Profes</th>
    </tr>
  </thead>
  <tbody>
    <?php

    arsort($profesores);//ordena alfabeticamente de manera inversa

    foreach($profesores as $Asignatura => $profesor){
      echo "<tr>";
      echo "<td>$Asignatura</td>";
      echo "<td>$profesor</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
<h3>------------------------------------------------</h3>
<h3>Tabla de Alumnos</h3>
  <!--
    Guillermo => 3  SUSPENSO
    Daina => 5      APROBADO
    Angel => 8      APROBADO
    Juanjo => 10    APROBADO
    Enya => 8       APROBADO
    Estela => 9     APROBADO
    Luis => 8       APROBADO


    DESPUES

    SI NOTA < 5 -> SUSPENSO
    SI NOTA < 7 -> APROBADO
    SI NOTA < 9 -> NOTABLE
    SI NOTA <= 10 -> SOBRESALIENTE

    !Y ADEMAS SI EL ALUMNO HA APROBADO, QUE SU FILA ESTE VERDE
    SI EL ALUMNO A SUSPENDIDO, QUE SU FILA ESTÉ ROJA
-->
<table>
<thead>
    <tr>
      <th>Alumnos</th>
      <th>Notas</th>
      <th>Estados</th>
    </tr>
  </thead>
  <tbody>
  <?php

$alumnos = array (
  "Guillermo" => 3,
  "Daina" => 5,
  "Angel" => 8,
  "Juanjo" => 10,
  "Enya" => 8,
  "Estela" => 9,
  "Luis" => 8 
);
    foreach($alumnos as $alumno => $nota){
      echo "<tr>";
      echo "<td>$alumno</td>";
      echo "<td>$nota</td>";
      if($nota < 5){
        echo "<td class='suspenso'>SUSPENSO</td>";
      }else if($nota < 7){
        echo "<td class='aprobado'>APROBADO</td>";
      }else if($nota < 9){
        echo "<td>NOTABLE</td>";
      }else{
        echo "<td>SOBRESALIENTE</td>";
      }
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
</body>
</html>
