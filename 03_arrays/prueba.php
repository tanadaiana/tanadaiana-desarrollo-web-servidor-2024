<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ArrayBi.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php
$videojuegos = [
            ["Fifa 24", "Deportes", 70],
            ["Dark Souls", "Soulslike", 50],
            ["Hollow Knigth", "Plataformas", 30]
        ];
    
    //añado dos filas nuevas a mi array

    array_push($videojuegos,["mario bross","plataforma",30]);
    array_push($videojuegos,["pac man","plataforma",28]);
     //MOSTRAR LAS LINEAS EN UNA TABLA 
     ?>
     <table>
     <thead>
         <tr>
             <th>tirulo</th>
             <th>categoria</th>
             <th>precio</th>
             
         </tr>
     </thead>
     <tbody>
         <?php
        
    ?>
</body>
</html>