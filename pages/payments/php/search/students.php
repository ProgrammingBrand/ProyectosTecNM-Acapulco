<?php
// Incluir el archivo de conexión
include($_SERVER['DOCUMENT_ROOT'] . '/src/data/link.php');  // Ajusta la ruta si es necesario

// Asegúrate de que la conexión se haya establecido
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Lógica para la búsqueda del alumno
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
            $_SESSION['results_alumno'] = $alumno; // Guardamos el resultado en la sesión
        } else {
            $_SESSION['results_alumno'] = "No se encontró ningún alumno con ese CURP.";
        }

        // Cerramos la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['results_alumno'] = "Error al preparar la consulta.";
    }
}
?>