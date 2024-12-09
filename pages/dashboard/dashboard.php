<?php
// Incluye la configuración de la sesión
include('../../src/data/session_config.php');

// Verifica que el usuario esté logueado
require_login(); // Si el usuario no está logueado, redirige al login

$nombre_completo = isset($_SESSION['user_full_name']) ? $_SESSION['user_full_name'] : 'Nombre no encontrado';
$rol = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'Rol no encontrado';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/src/styles/sidebar.css" />
    <link rel="stylesheet" href="/src/styles/footer.css">
    <link rel="stylesheet" href="/src/styles/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title></title>
  </head>
  <body>
    <main class="main">
      <aside class="sidebar">
        <nav>
          <ul>
            <li><a href="/src/pages/dashboard.html">
              <i class='bx bx-home-alt-2' ></i>
              <span class="link-submenu">Panel Principal</span></a></li>
            <li>
              <a href="" class="submenu-toggle">
                <i class='bx bx-book-open' ></i>
                <span class="link-submenu">Gestion</span></a>
              <ul class="submenu">
                <li><a class="sidebar-button" href="/pages/manage/alumnos.php">Alumnos</a></li>
                <li><a class="sidebar-button" href="/pages/manage/padres.php">Padres</a></li>
                <!--<li><a href="#">Opcion</a></li>-->
                <!--<li><a href="#">Opcion</a></li>-->
              </ul>
            </li>
            <li>
              <a href="#" class="submenu-toggle">
                <i class='bx bxs-buildings' ></i>
                <span class="link-submenu">Administrativos</span></a>
              <ul class="submenu">
                <!--<li><a href="#">pagos</a></li,>-->
                <li><a class="sidebar-button" data-page="pagos.html">Pagos</a></li>
                <li><a class="sidebar-button" data-page="alta-Registros.html">Registros</a></li>
                <!--<li><a href="#">Registros</a></li>-->
                <!--<li><a href="#">OPcion</a></li>-->
                <!--<li><a href="#">Opcion</a></li>-->
              </ul>
            </li>
           <li class="submenu-direccion">
              <a href="#" class="submenu-toggle">
                <i class='bx bxs-buildings' ></i>
                <span class="link-submenu">Dirección</span></a>
              <ul class="submenu">
                <li><a href="#">Panel Administrativo</a></li>
                <li><a href="#">Estadistica</a></li>
                <li><a class="sidebar-button" data-page="alta-Empleados.html">Altas</a></li>
                <li><a class="sidebar-button"data-page="alta-Empleados.html">Bajas</a></li>
              </ul>
            </li>
            <li><a href="#">
              <i class='bx bx-cog' ></i>
              <span class="link-submenu">Configuración</span></a>
            </li>
          </ul>
        </nav>
        <div class="profile-content">
          <div class="profile">
            <div class="profile-details">
              <img src="/src/img/new user.png" alt="s">
              <div class="name-profile">
                <div class="name"><?php echo htmlspecialchars($nombre_completo); ?></div>
                <div class="job"><?php echo htmlspecialchars($rol); ?></div>
              </div>
            </div>
            <a href="/src/data/logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
          </div>
        </div>
      </aside>
      <section id="content"></section>
    </main>
    <footer class="footer">
      <div class="footer-left">
        <a href="#">Acerca de</a>
        <a href="#">Política de Privacidad</a>
        <a href="#">Contáctenos</a>
      </div>
      <div class="footer-right">
        <strong>&copy; 2024 Instituto Hispanoamericano Méxicano</strong>
      </div>
    </footer>
    <script src="/src/javascript/main.js"></script>
  </body>
</html>
