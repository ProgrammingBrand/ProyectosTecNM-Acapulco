<?php
// Incluir el archivo de conexión
include($_SERVER['DOCUMENT_ROOT'] . '/src/data/link.php');  // Ajusta la ruta si es necesario

// Asegúrate de que la conexión se haya establecido
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$results_alumno = "";
$results_padre = "";

// --- Búsqueda de Alumno por CURP ---
if (isset($_POST['btnBuscarCurpAlumno']) && !empty($_POST['curp_alumno'])) {
    $curp = $_POST['curp_alumno'];

    // Consulta preparada para evitar inyección SQL
    $query = "SELECT * FROM alumnos WHERE CURP = ?";
    
    // Preparamos la consulta
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Enlazamos el parámetro (s para string) y ejecutamos la consulta
        mysqli_stmt_bind_param($stmt, "s", $curp);
        mysqli_stmt_execute($stmt);
        
        // Obtenemos el resultado
        $resultA = mysqli_stmt_get_result($stmt);
        
        // Verificamos si se encontraron resultados
        if (mysqli_num_rows($resultA) > 0) {
            // Obtenemos los datos del alumno
            $alumno = mysqli_fetch_assoc($resultA);
            $results_alumno = $alumno; // Almacenar los resultados completos del alumno
        } else {
            $results_alumno = "No se encontró ningún alumno con ese CURP.";
        }
        
        // Cerramos la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        $results_alumno = "Error al preparar la consulta.";
    }
}

// --- Búsqueda de Padre por RFC ---
if (isset($_POST['btnBuscarRfcPadre']) && !empty($_POST['rfc_padre'])) {
    $rfc = $_POST['rfc_padre'];

    // Consulta preparada para evitar inyección SQL
    $query = "SELECT * FROM padres WHERE RFC = ?";
    
    // Preparamos la consulta
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Enlazamos el parámetro (s para string) y ejecutamos la consulta
        mysqli_stmt_bind_param($stmt, "s", $rfc);
        mysqli_stmt_execute($stmt);
        
        // Obtenemos el resultado
        $resultP = mysqli_stmt_get_result($stmt);
        
        // Verificamos si se encontraron resultados
        if (mysqli_num_rows($resultP) > 0) {
            // Obtenemos los datos del padre
            $padre = mysqli_fetch_assoc($resultP);
            $results_padre = $padre; // Almacenar los resultados completos del padre
        } else {
            $results_padre = "No se encontró ningún padre con ese RFC.";
        }
        
        // Cerramos la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        $results_padre = "Error al preparar la consulta.";
    }
}
?>
