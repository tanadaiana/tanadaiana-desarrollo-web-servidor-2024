<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        
         ?>
         <form action="" method="post">
         <label for="numero">numero</label>
         <imput type="text" name="numero id="placeholder="introducion un numero"
         <br><br>
         <imput> type="submit"  value="genera" 
         </form>
         <?php 
         if($__server["REQUEST_METHOD"]=="POST"){
            
            $numero=(int)$_POST["numero];
            $esultado=0;

     for (i=1; $i< =10; $i++) {
   $resultado=$numero*1; 
    echo "<h1¡la tabla de multiplicar $numero</h1>";
}
         }

<table>
<thead>
    <tr>
        <th>numero</th>
        <th>categoria</th>
       
    </tr>
</thead>


</body>
</html>