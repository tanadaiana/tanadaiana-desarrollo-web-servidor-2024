<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    <?php 
    $numero_inicio = 0;
    $factorial = 5;
    $res=1;
    for ($i=$factorial; $i > $numero_inicio; $i--) { 
        $res *= $i;
    }
    echo $res;
    ?>
</body>
</html>