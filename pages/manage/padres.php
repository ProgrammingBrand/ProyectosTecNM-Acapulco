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
        <section id="content">
            <div class="header">
                <h3>Registro de Alumno</h3>
            </div>
            <div class="manage-control">
                <?php include('../../src/data/students_data.php'); ?>
                <!-- Pestañas -->
                <ul role="tablist" class="tab-list">
                    <li class="tab-item">
                        <a href="#insert" role="tab" aria-controls="insert" aria-selected="true"
                            class="tab-link">Insertar</a>
                    </li>
                    <li class="tab-item">
                        <a href="#consult" role="tab" aria-controls="consult" aria-selected="false"
                            class="tab-link">Consultar</a>
                    </li>
                    <li class="tab-item">
                        <a href="#modify" role="tab" aria-controls="modify" aria-selected="false"
                            class="tab-link">Modificar</a>
                    </li>
                    <li class="tab-item">
                        <a href="#delete" role="tab" aria-controls="delete" aria-selected="false"
                            class="tab-link">Eliminar</a>
                    </li>
                </ul>

                <!-- Contenido de las pestañas -->
                <div id="myTabContent">
                    <!-- Insertar -->
                    <div id="insert" role="tabpanel" aria-labelledby="insert-tab" class="tab-panel">
                        <div class="form-container">
                            <h3>Registro de alumno</h3>
                            <form method="POST" class="student-form">
                                <!-- Nombre -->
                                <div class="form-group">
                                    <label for="nombre">Nombre(s)</label>
                                    <input type="text" name="nombre" id="nombre" placeholder="Juan Carlos"
                                        class="form-input" />
                                </div>

                                <div class="form-group">
                                    <label for="apellidoP">Apellido paterno</label>
                                    <input type="text" name="apellidoP" id="apellidoP" placeholder="Lopez"
                                        class="form-input" />
                                </div>

                                <div class="form-group">
                                    <label for="apellidoM">Apellido materno</label>
                                    <input type="text" name="apellidoM" id="apellidoM" placeholder="Perez"
                                        class="form-input" />
                                </div>

                                <!-- Fecha de nacimiento -->
                                <div class="form-group">
                                    <label for="dia">Dia</label>
                                    <input type="text" name="dia" id="dia" placeholder="00" maxlength="2"
                                        pattern="\d{1,2}" title="Solo se permiten números (máx. 2 dígitos)" required
                                        class="form-input" />
                                </div>

                                <div class="form-group">
                                    <label for="mes">Mes de nacimiento</label>
                                    <select name="mes" id="mes" class="form-input">
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

                                <div class="form-group">
                                    <label for="anio">Año</label>
                                    <input type="text" class="form-control" name="anio" placeholder="2XXX"/>
                                </div>

                                <!-- RFC -->
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" name="rfc" id="rfc" class="form-input" />
                                </div>

                                <!-- Regimen fiscal -->
                                <div class="form-group">
                                    <label for="regimen">Regimen fiscal</label>
                                    <select name="regimen" id="nivel" class="form-input">
                                    <option selected>Elige alguna opcion</option>
                                                <option>Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                                                <option>Simplificado de Confianza</option>
                                                <option>Persona Física con Actividad Empresarial</option>
                                    </select>
                                </div>

                                <!-- Direccion -->
                                <div class="form-group">
                                    <label for="grado">Direccion</label>
                                    <input type="text" name="direccion" id="direccion" class="form-input" placeholder="Ingresa tu codigo postal" />
                                </div>

                                <!-- Codigo postal -->
                                <div class="form-group">
                                    <label for="rfc">Codigo postal</label>
                                    <input type="text" name="cp" id="cp" class="form-input" placeholder="Ingresa tu codigo postal" />
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Registrar alumno" name="btnRegistrarAlumno"
                                        class="submit-btn" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- consultar -->
                    <div id="consult" role="tabpanel" aria-labelledby="consult-tab" class="tab-panel">
                        <h3>Consultar alumnos</h3>
                        <div class="table-container">
                            <table class="student-table">
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
                                    <!-- <th>Matricula</th> -->
                                    <th>Accion</th>
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
                                    <!-- <td><?php echo $row['Matricula']; ?></td> -->
                                </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modificar -->
                    <div id="modify" role="tabpanel" aria-labelledby="modify-tab" class="tab-panel">
                        <h3>Modificar informacion de alumnos</h3>
                        <div class="table-container">
                            <table class="student-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Direccion</th>
                                    <th>CP</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>RFC</th>
                                    <th>Regimen fiscal</th>
                                    <!-- <th>Matricula</th> -->
                                    <th>Accion</th>
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
                    <div id="delete" role="tabpanel" aria-labelledby="delete-tab" class="tab-panel">
                        <h3>Eliminar alumno</h3>
                        <form method="POST" class="delete-form">
                            <div class="form-group">
                                <label for="delete-id">ID del alumno</label>
                                <input type="text" name="delete-id" id="delete-id" class="form-input" />
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Eliminar alumno" name="delete-btn" class="submit-btn" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>
    </main>

  <footer class="footer">
    <div class="footer-left">
      <a href="#">Acerca de</a>
      <a href="#">Política de Privacidad</a>
      <a href="/pages/faq/contact-us.php">Contáctenos</a>
    </div>
    <div class="footer-right">
      <strong>&copy; 2024 Instituto Hispanoamericano Méxicano</strong>
    </div>
  </footer>
  <script src="/src/script/tables.js"></script>
  </body>

</html>