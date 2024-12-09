<?php
// session_config.php

// Inicia la sesión solo si no ha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar si el usuario está logueado
function is_logged_in() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Función para redirigir al login si el usuario no está logueado
function require_login() {
    if (!is_logged_in()) {
        header('Location: /pages/login/login.php');
        exit;
    }
}
?>
