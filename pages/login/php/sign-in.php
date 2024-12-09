<?php
// Incluye la configuración de la sesión
include($_SERVER['DOCUMENT_ROOT'].'/src/data/session_config.php');

// Verificar si el formulario de login fue enviado
if (isset($_POST['btnIngresar'])) {
    $usuario = $_POST['user'];
    $clave = $_POST['pass'];

    // Establecer la conexión con la base de datos (ajusta esto según tu configuración)
    include($_SERVER['DOCUMENT_ROOT'].'/src/data/link.php');

    $sql = "SELECT * FROM administrativos WHERE Usuario='$usuario' AND Contrasenia='$clave'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // El usuario es válido
        $user = $result->fetch_assoc();
        
        // Guardar el id de usuario en la sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['Usuario'];  // Opcional: nombre de usuario
        $_SESSION['user_role'] = $user['Rol'];  // Opcional: rol de usuario
        $_SESSION['user_full_name'] = $user['NombreCompleto'];  // Guardar el nombre completo del usuario

        // Redirigir al dashboard
        header('Location: /pages/dashboard/dashboard.php');
        exit;
    } else {
        // Si las credenciales son incorrectas
        echo 'Credenciales incorrectas';
    }
}
?>

