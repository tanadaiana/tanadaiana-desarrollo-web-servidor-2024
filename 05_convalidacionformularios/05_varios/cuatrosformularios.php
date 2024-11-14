<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    // Declaración de variables constantes
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);

  /*  require('../05_convalidacionformularios/funciones/iva.php');    //<!---primer paso enlazarla rutas de todo los formularios que voy a agregar----->
    require('../05_convalidacionformularios/funciones/irpf.php');
    require('../05_convalidacionformularios/funciones/primosrango.php');
    require('../05_convalidacionformularios/funciones/temperaturas.php');*/
    require("../05_Funciones/Muchas_Funciones.php");
    ?>

    <title>Muchos formularios</title>
</head>
<body>
    <h1>IVA</h1>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br><br>
        <input type="hidden" name="accion" value="iva"><!--segundo paso poner  <input type="hidden" name="accion" value="formulario_edad">-->
        <input type="submit" value="Calcular PVP">
    </form>
    
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if ($_POST["accion"] == "iva") { //  <!-- tercer paso  comprobariva($precio, $iva);-->
            $precio = $_POST["precio"];
            $iva = $_POST["iva"];
            calcularIva(precio:$precio,iva:$iva); //<!-- llamar a la funcion -->
        } 
         } 
         ?>
</head>
<body>
    <h1> Formulario de IRPF </h1>
    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
        <input type="hidden" name="accion" value="formulario_IRPF">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['accion'] == 'formulario_IRPF') {
                $salario = $_POST["salario"];
                
                calcularIrpf($salario);
            }
        }
    ?>

    <h1> Formulario de IVA </h1>
    <form action="" method="POST">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio"><br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br><br>
        <input type="submit" value="Calcular PVP"><br><br>
        <input type="hidden" name="accion" value="formulario_IVA">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['accion'] == 'formulario_IVA') {
                $precio = $_POST["precio"];
                $iva = $_POST["iva"];

                calcularIva($precio, $iva);
            }
        }
    ?>
    <h1>Primos</h1>
    <form action="" method="post">
        <input type="text" name="desde" placeholder="Desde">
        <input type="text" name="hasta" placeholder="Hasta">
        <input type="text" name="num" placeholder="Número">
        <input type="hidden" name="accion" value="primos"><!--segundo paso poner  <input type="hidden" name="accion" value="formulario_edad">-->
        <input type="submit" value="Calcular Primos">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if ($_POST["accion"] == "primos") {  //  <!-- conecto con "accion";-->
            
            $desde = $_POST["desde"];
            $hasta = $_POST["hasta"];
           
            primosRango($desde, $hasta);//  <!-- llamo a la funcion-->
            
        } 
     } 
     ?>

    <br><br>

    <h1>Temperaturas</h1>
    <form action="" method="post">
        <label for="grado">Conversor de grados:</label>
        <input type="text" name="grado" id="grado" required>
        <label for="temperatura">Temperatura de origen:</label>
        <select name="temperatura" id="temperatura" required>
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <label for="temperatura2">Temperatura de destino:</label>
        <select name="temperatura2" id="temperatura2" required>  
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <input type="hidden" name="accion" value="temperatura"><!--segundo paso poner  <input type="hidden" name="accion" value="formulario_edad">-->
        <input type="submit" value="Convertir">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
         if ($_POST["accion"] == "temperatura") { //  <!-- aqui se conecta el accion ;-->
            
            $grado = $_POST["grado"];
            $temperatura = $_POST["temperatura"];
            $temperatura2 = $_POST["temperatura2"];
            calcularTemperatura($grado, $temperatura,$temperatura2);//  <!--llamo a la funcion->
            
            } 
    } ?>

</body>
</html>
