<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
   
    <?php
        
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
 
</head>
<body>
    <?php
       
        if (isset($_GET["limit"])) {
           
            if ($_GET["limit"] == "") $limit = "";
            else if ($_GET["limit"] == "limite") $limit = "limite";
            else if ($_GET["limit"] == "limite") $limit = "limite"; 
        } else {
            $limit = "";
        }

    
        $pagina = isset($_GET["page"]) ? $_GET["page"] : 1;
        
        
        $url = "https://dragonball-api.com/api/characters?page=$pagina&limit=$limit";
        
      
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $respuesta = curl_exec($curl); 
        curl_close($curl); 

      
        $datos = json_decode($respuesta, true);
        $animes = $datos["data"]; 
    ?>
    <div class="container">
        <h1>dragon ball</h1>
        <form action="" method="get">
            <div >            
                <div >
                    <input type="radio" name="type" value=""> Todo
                </div>
               
                <div >
                    <input type="submit" value="Filtrar" class="btn">
                </div>                       
            </div>
        </form> 
        
        <table>
            <thead>
                <tr>
                    <th >nombre</th>
                    <th >raza</th>
                    <th >genero</th>
                    <th >descripcion</th>
                   
                </tr>
               
            </thead>
            <tbody>
                <?php
             
                    foreach($animes as $anime) { ?>
                        <tr>
                            <td><?php echo $anime["name"] ?></td> 
                            <td><?php echo $anime["race"] ?></td> 
                            <td><?php echo $anime["gender"] ?></td> 
                            <td><?php echo $anime["description"] ?></td> 
                            <td>
                                <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
                            </td> 
                            <td>
                                <a class="btn" href="indexdragon.php??><?php echo $pagina ?>">Enlace</a>
                            </td> 
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php        
       
        $siguiente = $pagina + 1;
        $anterior = $pagina - 1;
        $inicio=$inicio+1;
        $final=$final-1;
    ?>
    <div >
        <?php 
     
        if ($anterior != 0) {?>
            <a href="indexdragon.php?page=<?php echo $inicio ?>>inicio</a>
            <a href="indexdragon.php?page=<?php echo $anterior ?>>anterior</a>
            <a href="indexdragon.php?page=<?php echo $siguiente ?>>Siguiente</a>
            <a href="indexdragon.php?page=<?php echo $final ?>final</a>
        <?php } 
        else { ?>  
            <a href="indexdragon.php?page=<?php echo $inicio ?>">inicio</a>
            <a href="indexdragon.php?page=<?php echo $anterios ?>">anterior</a>
            <a href="indexdragon.php?page=<?php echo $siguiente ?>">Siguiente</a>
            <a href="indexdragon.php?page=<?php echo $final ?>">final</a>
           
        <?php } ?>
    </div>
</body>
</html>