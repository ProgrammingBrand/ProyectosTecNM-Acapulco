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
  <link rel="stylesheet" href="contact-us.css">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title></title>
</head>

<body>
<main class="main">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="/pages/dashboard/dashboard.php">
                            <i class='bx bx-home-alt-2'></i>
                            <span class="link-submenu">Panel Principal</span></a></li>
                    <li>
                        <a href="" class="submenu-toggle">
                            <i class='bx bx-book-open'></i>
                            <span class="link-submenu">Gestion</span></a>
                        <ul class="submenu">
                            <li><a class="sidebar-button" data-page="alta-alumnos.html">Alumnos</a></li>
                            <li><a class="sidebar-button" data-page="alta-padres.html">Padres</a></li>
                            <!--<li><a href="#">Opcion</a></li>-->
                            <!--<li><a href="#">Opcion</a></li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="submenu-toggle">
                            <i class='bx bxs-buildings'></i>
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
                            <i class='bx bxs-buildings'></i>
                            <span class="link-submenu">Dirección</span></a>
                        <ul class="submenu">
                            <li><a href="#">Panel Administrativo</a></li>
                            <li><a href="#">Estadistica</a></li>
                            <li><a class="sidebar-button" data-page="alta-Empleados.html">Altas</a></li>
                            <li><a class="sidebar-button" data-page="alta-Empleados.html">Bajas</a></li>
                        </ul>
                    </li>
                    <li><a href="#">
                            <i class='bx bx-cog'></i>
                            <span class="link-submenu">Configuración</span></a>
                    </li>
                </ul>
            </nav>
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details">
                        <img src="/src/img/new user.png" alt="s">
                        <div class="name-profile">
                            <div class="name">
                                <?php echo htmlspecialchars($nombre_completo); ?>
                            </div>
                            <div class="job">
                                <?php echo htmlspecialchars($rol); ?>
                            </div>
                        </div>
                    </div>
                    <a href="/src/data/logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
                </div>
            </div>
        </aside>
        <section id="contact-us">
    <div class="contact-container">
        <h2>Contáctanos</h2>
        <p>¿Tienes alguna pregunta o necesitas ayuda? Completa el formulario y nos pondremos en contacto contigo lo antes posible.</p>
        <form action="contact_process.php" method="POST" class="contact-form">
            <!-- Nombre -->
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" placeholder="Ingresa tu nombre" required class="form-input">
            </div>
            
            <!-- Correo Electrónico -->
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" placeholder="tuemail@ejemplo.com" required class="form-input">
            </div>
            
            <!-- Asunto -->
            <div class="form-group">
                <label for="subject">Asunto</label>
                <input type="text" name="subject" id="subject" placeholder="Escribe el asunto" required class="form-input">
            </div>
            
            <!-- Mensaje -->
            <div class="form-group">
                <label for="message">Mensaje</label>
                <textarea name="message" id="message" rows="5" placeholder="Escribe tu mensaje" required class="form-input"></textarea>
            </div>
            
            <!-- Botón Enviar -->
            <div class="form-group">
                <button type="submit" name="submit_contact" class="submit-btn">Enviar Mensaje</button>
            </div>
        </form>
    </div>
    
    <!-- Sección de mapa -->
    <div class="map-container">
        <h3>Encuéntranos aquí</h3>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.6963992994764!2d-99.90175542431004!3d16.85088412863938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc3ad6b25fdc3%3A0x4d57c6161f986a9a!2sVicente%20Guerrero%2049%2C%20Barrios%20Historicos%2C%2039300%20Acapulco%20de%20Ju%C3%A1rez%2C%20Gro.!5e0!3m2!1ses!2smx!4v1699162403945!5m2!1ses!2smx" 
            width="100%" 
            height="350" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

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
  <script src="/src/script/tables.js"></script>
  </body>

</html>