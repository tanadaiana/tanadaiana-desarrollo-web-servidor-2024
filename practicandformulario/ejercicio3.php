<title>Primos en un rango</title>
</head>
<body>
    <form action="" method="post">
        <label for="numero1">Número 1:</label>
        <input type="number" name="numero1" id="numero1">

        <label for="numero2">Número 2:</label>
        <input type="number" name="numero2" id="numero2">

        <input type="submit" value="Buscar Primos">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];

        
        if ($numero1 > $numero2) {
            $temp = $numero1;
            $numero1 = $numero2;
            $numero2 = $temp;
        }

        // #######Inicializar el contador
        $i = $numero1;

    
        echo "<p>Números primos entre $numero1 y $numero2:</p>";
        echo "<p>";

        while ($i <= $numero2) {
            
            $esPrimo = true;

            if ($i < 2) {
                $esPrimo = false; 
            } else {
                $j = 2;
                while ($j <= sqrt($i)) { 
                    if ($i % $j == 0) {
                        $esPrimo = false;
                        
                    }
                    $j++;
                }
            }

        
            if ($esPrimo) {
                echo $i . " ";
            }

            $i++; 
        }

        echo "</p>";
    }
    ?>
</body>
</html>