<?php
// Iniciar la sesión para poder acceder a las variables de sesión
session_start();

// Limpiar las variables de sesión asociadas a los resultados de búsqueda
unset($_SESSION['results_alumno']);
unset($_SESSION['results_padre']);

// Redirigir de vuelta al formulario o página principal
header("Location: ../../main-payments.php");  // Asegúrate de cambiar esta URL si es necesario
exit();
?>
