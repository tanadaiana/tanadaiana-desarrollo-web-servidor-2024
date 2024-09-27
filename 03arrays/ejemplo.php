<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   /* $fruta=array{
        " calve 1"=>"manzana",
        "calve 2"=>"uva"
        "clave 3"=>"naranja"
    };*/

    
   /*print_r($fruta);

     $fruta=[
        "manzana",
        "uva",
        "naranja"
     ];
     array_push($fruta,"mango","melocoton");
     $fruta[7]="uva";
     $fruta[]="sandia";
$fruta=array_values($fruta);//te ordena todo el array ,machaca la clave y la ordena 
    print_r $fruta[1];

    unset($fruta[1]);
    $fruta=array_values($fruta);*/


    /*$base_datos=array[
        "57884646"=>"jose alonso",
        "576945487"=>"antonio perez",
        "876765675"=>"estela gonzales"
    ];
    print_r ($base_datos);//esto imprime todo el array
    echo <p> .$base_datos["576945487"] . </p>; //esto inmrime solo una posicion
*/

$colores= array(
    "verde",
    "morado",
    "rojo"
);
 array_push($colores,"azul","amarillo");//agrego 2 colores 
 $colores[7]="celeste";
 $colores[]="blanco";
 
$colores=array_values($colores);//te ordena todo el array ,machaca la clave y la ordena 
print_r($colores[1]);

unset($colores[1]);
$colores=array_values($colores);/*//para borrar*/
print_r($colores);
    ?>
</body>
</html>