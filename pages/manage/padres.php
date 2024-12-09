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
    <link rel="stylesheet" href="/src/styles/m-students.css">
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
    <div class="manage-control mt-4">
    <!-- Pestañas -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="insert-tab" data-toggle="tab" href="#insert" role="tab"
               aria-controls="insert" aria-selected="true">Insertar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="consult-tab" data-toggle="tab" href="#consult" role="tab" aria-controls="consult"
               aria-selected="false">Consultar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="modify-tab" data-toggle="tab" href="#modify" role="tab" aria-controls="modify"
               aria-selected="false">Modificar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="delete-tab" data-toggle="tab" href="#delete" role="tab" aria-controls="delete"
               aria-selected="false">Eliminar</a>
        </li>
    </ul>

    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="myTabContent">
        <!-- Insertar -->
        <div class="tab-pane fade show active" id="insert" role="tabpanel" aria-labelledby="insert-tab">
            <div class="main-form">
                <h3>Registro de padres</h3>
                <form class="row g-3" method="POST">
                    <!-- Nombre -->
                    <div class="col-4">
                        <label class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre" />
                    </div>

                    <div class="col-4">
                        <label class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" name="apellidoP" />
                    </div>

                    <div class="col-4">
                        <label class="form-label">Apellido materno</label>
                        <input type="text" class="form-control" name="apellidoM" />
                    </div>

                    <!-- Dirección y Código postal -->
                    <div class="col-md-6">
                        <label class="form-label">Dirección</label>
                        <input class="form-control" placeholder="Ingresa tu dirección" name="direccion" />
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Código postal</label>
                        <input class="form-control" placeholder="Ingresa tu código postal" name="cp" />
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div class="col-1">
                        <label for="inputAddress" class="form-label">Día</label>
                        <input type="text" class="form-control" name="dia" placeholder="00" />
                    </div>

                    <div class="col-2">
                        <label class="form-label">Mes de nacimiento</label>
                        <select class="form-select" name="mes">
                            <option selected>Mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>

                    <div class="col-1">
                        <label for="inputAddress" class="form-label">Año</label>
                        <input type="text" class="form-control" name="anio" placeholder="2XXX" />
                    </div>

                    <div class="col-4">
                        <label class="form-label">RFC</label>
                        <input type="text" class="form-control" name="rfc" />
                    </div>

                    <!-- Regimen fiscal -->
                    <div class="col-md-4">
                        <label class="form-label">Regimen fiscal</label>
                        <select class="form-select" name="regimen">
                            <option selected>Elige alguna opción</option>
                            <option>Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                            <option>Simplificado de Confianza</option>
                            <option>Persona Física con Actividad Empresarial</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="Registrar padre" name="btnRegistrarPadre" />
                    </div>
                    <?php include('BD_CRUD/InsertarP.php'); ?>
                </form>
            </div>
        </div>

        <!-- Consultar -->
        <div class="tab-pane fade" id="consult" role="tabpanel" aria-labelledby="consult-tab">
            <br>
            <h3>Consultar padres</h3>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Dirección</th>
                            <th>CP</th>
                            <th>Fecha de nacimiento</th>
                            <th>RFC</th>
                            <th>Regimen fiscal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM padres";
                            $result_tasks = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['ApellidoP']; ?></td>
                                <td><?php echo $row['ApellidoM']; ?></td>
                                <td><?php echo $row['Direccion']; ?></td>
                                <td><?php echo $row['CP']; ?></td>
                                <td><?php echo $row['Edad']; ?></td>
                                <td><?php echo $row['RFC']; ?></td>
                                <td><?php echo $row['RegimenFiscal']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modificar -->
        <div class="tab-pane fade" id="modify" role="tabpanel" aria-labelledby="modify-tab">
            <br>
            <h3>Modificar Información de padres</h3>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Dirección</th>
                            <th>CP</th>
                            <th>Fecha de nacimiento</th>
                            <th>RFC</th>
                            <th>Regimen fiscal</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM padres";
                            $result_tasks = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['ApellidoP']; ?></td>
                                <td><?php echo $row['ApellidoM']; ?></td>
                                <td><?php echo $row['Direccion']; ?></td>
                                <td><?php echo $row['CP']; ?></td>
                                <td><?php echo $row['Edad']; ?></td>
                                <td><?php echo $row['RFC']; ?></td>
                                <td><?php echo $row['RegimenFiscal']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        Modificar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Eliminar -->
        <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
            <br>
            <h3>Dar de baja padres</h3>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Dirección</th>
                            <th>CP</th>
                            <th>Fecha de nacimiento</th>
                            <th>RFC</th>
                            <th>Regimen fiscal</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM padres";
                            $result_tasks = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['ApellidoP']; ?></td>
                                <td><?php echo $row['ApellidoM']; ?></td>
                                <td><?php echo $row['Direccion']; ?></td>
                                <td><?php echo $row['CP']; ?></td>
                                <td><?php echo $row['Edad']; ?></td>
                                <td><?php echo $row['RFC']; ?></td>
                                <td><?php echo $row['RegimenFiscal']; ?></td>
                                <td>
                                    <a href="BD_CRUD/EliminarA.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?>" role="alert">
                    <?= $_SESSION['message']; ?>
                </div>
                <?php unset($_SESSION['message']); } ?>
            </div>
        </div>
    </div>
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
  <script src="/src/script/manage-menu.js"></script>
</body>

</html>