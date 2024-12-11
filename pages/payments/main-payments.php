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
  <link rel="stylesheet" href="/src/styles/sidebar.css">
  <link rel="stylesheet" href="/src/styles/footer.css">
  <link rel="stylesheet" href="/src/styles/header.css">
  <link rel="stylesheet" href="/src/styles/styles.css">
  <link rel="stylesheet" href="/src/styles/InvoiceG.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title></title>
</head>

<body>
  <main class="main">
    <aside class="sidebar">
      <nav>
        <ul>
          <li><a href="/src/pages/dashboard.html">
              <i class='bx bx-home-alt-2'></i>
              <span class="link-submenu">Panel Principal</span></a></li>
          <li>
            <a href="" class="submenu-toggle">
              <i class='bx bx-book-open'></i>
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
    <section id="content">
      <?php include('php/search/students.php'); include('php/search/partners.php'); include('php/invoice-generator.php'); ?>
      <div class="header">
        <h3>Generar Factura</h3>
      </div>
      <form class="search" method="POST" action="">
        <!-- Búsqueda de Alumno -->
        <label for="curp_alumno">Buscar Alumno por CURP:</label>
        <input type="text" name="curp_alumno" id="curp_alumno"
          value="<?php echo isset($_POST['curp_alumno']) ? htmlspecialchars($_POST['curp_alumno']) : ''; ?>">
        <button type="submit" name="btnBuscarCurpAlumno">Buscar Alumno</button>

        <!-- Búsqueda de Padre -->
        <label for="rfc_padre">Buscar Padre por RFC:</label>
        <input type="text" name="rfc_padre" id="rfc_padre"
          value="<?php echo isset($_POST['rfc_padre']) ? htmlspecialchars($_POST['rfc_padre']) : ''; ?>">
        <button type="submit" name="btnBuscarRfcPadre">Buscar Padre</button>
      </form>
      <form method="POST" action="php/search/clear.php">
        <button type="submit">Limpiar Datos</button>
      </form>


      <h2>Resultados</h2>
      <div class="result-container">
        <!-- Resultados del Alumno -->
        <div id="result-alumno">
          <?php if (isset($_SESSION['results_alumno']) && is_array($_SESSION['results_alumno'])): ?>
          <p><strong>Nombre del Alumno:</strong>
            <?php echo htmlspecialchars($_SESSION['results_alumno']['Nombre']); ?>
            <?php echo htmlspecialchars($_SESSION['results_alumno']['ApellidoP']); ?>
            <?php echo htmlspecialchars($_SESSION['results_alumno']['ApellidoM']); ?>
          </p>
          <p><strong>CURP:</strong>
            <?php echo htmlspecialchars($_SESSION['results_alumno']['CURP']); ?>
          </p>
          <p><strong>Nivel de Estudios:</strong>
            <?php echo htmlspecialchars($_SESSION['results_alumno']['NivelEducativo']); ?>
          </p>
          <p><strong>Grado de Estudios:</strong>
            <?php echo htmlspecialchars($_SESSION['results_alumno']['Grado']); ?>
          </p>
          <?php elseif (!empty($_SESSION['results_alumno'])): ?>
          <p>
            <?php echo htmlspecialchars($_SESSION['results_alumno']); ?>
          </p>
          <?php endif; ?>
        </div>

        <!-- Resultados del Padre -->
        <div id="result-padre">
          <?php if (isset($_SESSION['results_padre']) && is_array($_SESSION['results_padre'])): ?>
          <p><strong>Nombre del Padre:</strong>
            <?php echo htmlspecialchars($_SESSION['results_padre']['Nombre']); ?>
            <?php echo htmlspecialchars($_SESSION['results_padre']['ApellidoP']); ?>
            <?php echo htmlspecialchars($_SESSION['results_padre']['ApellidoM']); ?>
          </p>
          <p><strong>RFC:</strong>
            <?php echo htmlspecialchars($_SESSION['results_padre']['RFC']); ?>
          </p>
          <p><strong>Regimen Fiscal:</strong>
            <?php echo htmlspecialchars($_SESSION['results_padre']['RegimenFiscal']); ?>
          </p>
          <p><strong>Dirección:</strong>
            <?php echo htmlspecialchars($_SESSION['results_padre']['Direccion']); ?>
            <?php echo htmlspecialchars($_SESSION['results_padre']['CP']); ?>
          </p>
          <?php elseif (!empty($_SESSION['results_padre'])): ?>
          <p>
            <?php echo htmlspecialchars($_SESSION['results_padre']); ?>
          </p>
          <?php endif; ?>
        </div>
      </div>
      
      <form action="" method="POST">
  <div class="invoice">
    <div class="ammount">
      <label for="ammountQ">Concepto</label>
      <input type="text" name="item_1[]" id="item_1" value="">
      <input type="text" name="item_1[]" id="item_2" value="">
      <input type="text" name="item_1[]" id="item_3" value="">
      <input type="text" name="item_1[]" id="item_4" value="">
    </div>
    <div class="price">
      <label for="priceQ">Precios de los productos</label>
      <input type="text" name="price[]" id="price_1" class="price-input" value="">
      <input type="text" name="price[]" id="price_2" class="price-input" value="">
      <input type="text" name="price[]" id="price_3" class="price-input" value="">
      <input type="text" name="price[]" id="price_4" class="price-input" value="">
    </div>
  </div>
  <div class="Concept">
    <div class="letters"></div>
    <div class="taxes">
      <div class="sub-amount">
        <label for="subAmount">Subtotal</label>
        <input type="text" name="subAmount" id="subAmount" value="" readonly>
      </div>
      <div class="tax">
        <label for="taxes">Impuestos</label>
        <input type="text" name="taxes" id="taxes" value="" readonly>
      </div>
      <div class="total">
        <label for="total">Total</label>
        <input type="text" name="total" id="total" value="" readonly>
      </div>
      <div class="payment-method">
        <label for="pay">Método de Pago</label>
        <select name="pay" id="pay" class="form input">
          <option selected>Seleccione método de pago</option>
          <option value="01">Efectivo</option>
          <option value="02">Cheque nominativo</option>
          <option value="03">Transferencia electrónica de fondos</option>
          <option value="04">Tarjeta de crédito</option>
          <option value="28">Tarjeta de débito</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <input type="submit" value="Generar Factura" name="btnGenerar" class="submit-btn" />
  </div>
</form>

    </section>

  </main>
  <footer class="footer">
    <div class="footer-left">
      <a href="/pages/payments/php/invoice-generator.php">Acerca de</a>
      <a href="/pages/payments/php/pdf/invoice.pdf.php">Política de Privacidad</a>
      <a href="#">Contáctenos</a>
    </div>
    <div class="footer-right">
      <strong>&copy; 2024 Instituto Hispanoamericano Méxicano</strong>
    </div>
  </footer>
  <script src="/src/script/sidebar.js"></script>
  <script src="/pages/payments/js/taxes.js"></script>
</body>

</html>