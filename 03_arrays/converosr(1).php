<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
<form action=" "    method="post">
        <label for="cantidad"> conversor de dinero</label>
        <input type="text" name="cantidad" id="cantidad" placeholder="placeholder: cantidad" >

        <label for="monedaorigen" ></label>
        <input type="text" name ="monedaorigen" id="monedaorigen" placeholder="monedaorigen">

        <label for="monedadestino"></label>
        <input type="text" name="monedadestino" id="monedadestino" placeholder="monedadestino">
        <input type="submit" value="enviar">

    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $cantidad=$_POST["cantidad"];
        $monedaorigen=$_POST["monedaorigen"];  
        $monedadestino=$_POST["monedadestino"];
        

        $opcion=match (true) {
          $monedaorigen == 'EUR' && $monedadestino ==  'EUR'   =>  1,
          $monedaorigen == 'EUR' && $monedadestino ==   'USD' =>  1.09,
          $monedaorigen == 'EUR' && $monedadestino ==    'JPY'=>  156.45,

          $monedaorigen ==  'USD' && $monedadestino ==  'USD'   => 1 ,
          $monedaorigen ==  'USD' && $monedadestino ==  'JPY'=>  1.09,
          $monedaorigen ==  'USD' && $monedadestino ==  'EUR'   =>  1.09,

          $monedaorigen ==  'JPY' && $monedadestino ==  'JPY'  =>  1,
          $monedaorigen ==  'JPY' && $monedadestino ==   'EUR' =>  0.0064,
          $monedaorigen ==  'JPY' && $monedadestino ==  'USD'  =>  0.0067,
          
          default => 0.0,  
        };
        if ($opcion> 0) {
            $resultado = $cantidad * $opcion;
            echo "La cantidad de $cantidad $monedaOrigen es equivalente a $resultado $monedaDestino.";
        } else {
            echo "Conversión de $monedaOrigen a $monedaDestino no soportada.";
    }
     }
     ?>
    
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
