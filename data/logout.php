<?php
// logout.php
session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión

// Redirige al login
header('Location: /pages/login/login.php');
exit;
?>
