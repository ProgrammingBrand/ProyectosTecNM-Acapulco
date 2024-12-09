<?php
// Incluye la configuración de la sesión
include('src/data/session_config.php');

// Si el usuario está logueado, redirige al dashboard, si no, al login
if (is_logged_in()) {
    // Redirige al dashboard si el usuario está logueado
    header('Location: /pages/dashboard/dashboard.php');
    exit;
} else {
    // Redirige al login si el usuario no está logueado
    header('Location: /pages/login/login.php');
    exit;
}
?>
