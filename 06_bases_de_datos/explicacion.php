<?php/*Resumen Global del Código
Este script PHP implementa una API RESTful para interactuar con una base de datos.
 La API permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre una tabla llamada estudios.*/

    // Activa la notificación de todos los errores y los muestra en pantalla (útil para depuración).
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    // Configura el encabezado de respuesta para indicar que el contenido será en formato JSON.
    header("Content-type: application/json");

    // Incluye el archivo "conexion_pdo.php", que establece la conexión a la base de datos.
    include("conexion_pdo.php");

    // Obtiene el método HTTP usado en la solicitud (GET, POST, PUT, DELETE, etc.).//es una clave en este arreglo que devuelve el método HTTP utilizado para acceder a la página.
    $metodo = $_SERVER["REQUEST_METHOD"];
    //$metodo: Determina el tipo de acción que debe realizarse (leer, insertar, actualizar o borrar datos).

    // Lee el cuerpo de la solicitud HTTP, lo interpreta como JSON y lo convierte en un array asociativo.
    $entrada = json_decode(file_get_contents('php://input'), true);
//$entrada: Contiene los datos que el cliente envía al servidor (como los datos de un formulario o una solicitud de actualización).

    // Dependiendo del método HTTP, llama a la función correspondiente para manejar la solicitud.
    switch($metodo) {
        case "GET":
            manejarGet($_conexion); // Llama a la función para manejar solicitudes GET.//Solicita datos del servidor (por ejemplo, al cargar una página web o solicitar un recurso).
            break;
        case "POST":
            manejarPost($_conexion, $entrada); // Llama a la función para manejar solicitudes POST.// Envía datos al servidor (por ejemplo, al enviar un formulario).
            break;
        case "PUT":
            manejarPut($_conexion, $entrada); // Llama a la función para manejar solicitudes PUT.// Actualiza un recurso existente en el servidor.
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada); // Llama a la función para manejar solicitudes DELETE.// Borra un recurso del servidor.
            break;
        default:
            // Devuelve un mensaje de error si el método HTTP no es válido.
            echo json_encode(["mensaje" => "Petición no válida"]);
    }

    // Función para manejar solicitudes GET (obtención de datos).
    //Si se especifica un parámetro ciudad, devuelve los registros que coincidan con esa ciudad.
    //Si no hay parámetros, devuelve todos los registros de la tabla.
    function manejarGet($_conexion) {
        if (isset($_GET["ciudad"])) {
            // Si se especifica el parámetro "ciudad", selecciona los registros correspondientes.
            $sql = "SELECT * FROM estudios WHERE ciudad = :ciudad";
            $stmt = $_conexion->prepare($sql);
            $stmt->execute([
                "ciudad" => $_GET["ciudad"]
            ]);
        } else {
            // Si no se especifica "ciudad", selecciona todos los registros de la tabla "estudios".
            $sql = "SELECT * FROM estudios";
            $stmt = $_conexion->prepare($sql);
            $stmt->execute();
        }
        // Obtiene todos los resultados como un array asociativo y los devuelve en formato JSON.
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }

    // Función para manejar solicitudes POST (creación de datos).
    //Inserta un nuevo registro en la tabla estudios con los datos proporcionados en el cuerpo de la solicitud.
    function manejarPost($_conexion, $entrada) {
        // Inserta un nuevo registro en la tabla "estudios" usando los datos proporcionados.
        $sql = "INSERT INTO estudios (nombre_estudio, ciudad, anno_fundacion) 
            VALUES (:nombre_estudio, :ciudad, :anno_fundacion)";
        $stmt = $_conexion->prepare($sql);
        $stmt->execute([
            "nombre_estudio" => $entrada["nombre_estudio"], // Nombre del estudio a insertar.
            "ciudad" => $entrada["ciudad"],                 // Ciudad del estudio.
            "anno_fundacion" => $entrada["anno_fundacion"]  // Año de fundación del estudio.
        ]);
        // Devuelve un mensaje dependiendo del éxito o fallo de la operación.
        if ($stmt) {
            echo json_encode(["mensaje" => "el estudio se ha creado"]);
        } else {
            echo json_encode(["mensaje" => "error al crear el estudio"]);
        }
    }

    // Función para manejar solicitudes PUT (actualización de datos).
    //Actualiza un registro en la tabla basado en el nombre del estudio (nombre_estudio).
    function manejarPut($_conexion, $entrada) {
        // Actualiza un registro existente en la tabla "estudios" basado en el nombre del estudio.
        $sql = "UPDATE estudios SET
            ciudad = :ciudad,
            anno_fundacion = :anno_fundacion
            WHERE nombre_estudio = :nombre_estudio";//actúa como identificador único
        $stmt = $_conexion->prepare($sql);
        $stmt->execute([
            "ciudad" => $entrada["ciudad"],                 // Nueva ciudad del estudio.
            "anno_fundacion" => $entrada["anno_fundacion"], // Nuevo año de fundación.
            "nombre_estudio" => $entrada["nombre_estudio"]  // Nombre del estudio a actualizar.
        ]);
        // Devuelve un mensaje dependiendo del éxito o fallo de la operación.
        if ($stmt) {
            echo json_encode(["mensaje" => "el estudio se ha modificado"]);
        } else {
            echo json_encode(["mensaje" => "error al modificar el estudio"]);
        }
    }

    // Función para manejar solicitudes DELETE (eliminación de datos).
    //Elimina un registro basado en el nombre del estudio (nombre_estudio).
    function manejarDelete($_conexion, $entrada) {
        // Elimina un registro de la tabla "estudios" basado en el nombre del estudio.
        $sql = "DELETE FROM estudios WHERE nombre_estudio = :nombre_estudio";
        $stmt = $_conexion->prepare($sql);
        $stmt->execute([
            "nombre_estudio" => $entrada["nombre_estudio"] // Nombre del estudio a eliminar.
        ]); 
        // Devuelve un mensaje dependiendo del éxito o fallo de la operación.
        if ($stmt) {
            echo json_encode(["mensaje" => "el estudio se ha borrado"]);
        } else {
            echo json_encode(["mensaje" => "error al borrar el estudio"]);
        }
    }
    //Todas las respuestas se devuelven en formato JSON, indicando el resultado de la operación (éxito o error).
?>
