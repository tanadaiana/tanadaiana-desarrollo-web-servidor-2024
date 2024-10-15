<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrays bidemmensional</title>
    <link href="style.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $videoguegos=[
        ["fifa 25","deporte", 70],
        ["dark soul","soulslike", 50],
        ["pinbal","deporte", 30],
    ];






    
    foreach ($videoguegos as $videojuego ) {//este for recorre todo el for
        list($titulo,$categoria,$precio)=$videojuego;//esto es una lista q te almacena categoria ,precio
    echo "<p> $titulo,$categoria,$precio</p>";
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
        foreach ($videoguegos as $videojuego) {
            list($titulo,$categoria,$precio)=$videojuego;
            echo "<tr>";
            echo "<td>$titulo</td>";
            echo "<td>$categoria</td>";
            echo "<td>$precio</td>";
            echo "</tr>";
        } 
        
        ?>  
    </tbody>
    </table>
</body>
</html>