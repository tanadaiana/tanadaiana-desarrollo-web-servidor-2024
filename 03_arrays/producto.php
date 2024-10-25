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
    
  

    <form action="" method="post">
    <label for="producto">productp</label>
    <imput type="text" name="producto" id="placeholder="lista de producto"
    <br></br>
    </form>

    $productos=[
        ["nintendo sqitch",300],
        ["plastorion 5 slim",800],
        ["plastorion 5 pro",800],
        ["vbox serie ", 400],
        ["xbox serie xp  pro",800],
    ]
    
    
    foreach ($productos as $producto ) {//este for recorre todo el for
        list($juegos,$precio)=$productos;//esto es una lista q te almacena categoria ,precio
    echo "<p> $juegos,,$precio</p>";
    }

    ?>
    <table>
    <thead>
        <tr>
            <th>juegos </th>
            <th>precio</th>
          
    </thead>
    <tbody>
        <?php
        foreach ($productos as $producto) {
            list($juegos,$precio)=$productos;
            echo "<tr>";
            echo "<td>$juegos</td>";
            echo "<td>$precios</td>";
            echo "</tr>";
        } 
        
        ?>  
    </tbody>
    </table>
</body>
</html>