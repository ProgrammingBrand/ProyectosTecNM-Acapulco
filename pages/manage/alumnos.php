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
                                    <input type="text" name="anio" id="anio" placeholder="2009" maxlength="4"
                                        pattern="\d{4}" title="Solo se permiten números (exactamente 4 dígitos)"
                                        required class="form-input" />
                                </div>

                                <!-- Curp -->
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input type="text" name="curp" id="curp" class="form-input" />
                                </div>

                                <!-- Nivel educativo -->
                                <div class="form-group">
                                    <label for="nivel">Nivel educativo</label>
                                    <select name="nivel" id="nivel" class="form-input">
                                        <option selected>Elige alguna opcion</option>
                                        <option>Preescolar</option>
                                        <option>Primaria</option>
                                        <option>Secundaria</option>
                                    </select>
                                </div>

                                <!-- Grado -->
                                <div class="form-group">
                                    <label for="grado">Grado</label>
                                    <select name="grado" id="grado" class="form-input">
                                        <option selected>Elige alguna opcion</option>
                                        <option>1ro</option>
                                        <option>2do</option>
                                        <option>3ro</option>
                                        <option>4to</option>
                                        <option>5to</option>
                                        <option>6to</option>
                                    </select>
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
                                        <th>Edad</th>
                                        <th>CURP</th>
                                        <th>NivelEducativo</th>
                                        <th>Grado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $query = "SELECT * FROM alumnos";
                        $result_tasks = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Nombre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ApellidoP']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ApellidoM']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['FechaN']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['CURP']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['NivelEducativo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Grado']; ?>
                                        </td>
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
                                        <th>Edad</th>
                                        <th>CURP</th>
                                        <th>NivelEducativo</th>
                                        <th>Grado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $query = "SELECT * FROM alumnos";
                        $result_tasks = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Nombre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ApellidoP']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ApellidoM']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['FechaN']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['CURP']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['NivelEducativo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Grado']; ?>
                                        </td>
                                        <td>
                                            <button
                                                onclick="showForm('<?php echo $row['id']; ?>', '<?php echo $row['Nombre']; ?>', '<?php echo $row['ApellidoP']; ?>', '<?php echo $row['ApellidoM']; ?>', '<?php echo $row['FechaN']; ?>', '<?php echo $row['CURP']; ?>', '<?php echo $row['NivelEducativo']; ?>', '<?php echo $row['Grado']; ?>')"
                                                class="modify-btn">
                                                Modificar
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Formulario oculto -->
                        <div id="editForm" class="edit-form">
                            <h3>Editar Alumno</h3>
                            <form method="POST" class="student-form">
                                <input type="hidden" name="id" id="form-id" />
                                <div class="form-group">
                                    <label for="form-nombre">Nombre</label>
                                    <input type="text" id="form-nombre" name="nombre" class="form-input" />
                                </div>
                                <div class="form-group">
                                    <label for="form-apellidoP">Apellido Paterno</label>
                                    <input type="text" id="form-apellidoP" name="apellidoP" class="form-input" />
                                </div>
                                <div class="form-group">
                                    <label for="form-apellidoM">Apellido Materno</label>
                                    <input type="text" id="form-apellidoM" name="apellidoM" class="form-input" />
                                </div>
                                <div class="form-group">
                                    <label for="form-fechaN">Edad:</label>
                                    <input type="text" id="form-fechaN" name="fechaN" class="form-input" />
                                </div>
                                <div class="form-group">
                                    <label for="form-curp">CURP</label>
                                    <input type="text" id="form-curp" name="curp" class="form-input" />
                                </div>
                                <div class="form-group">
                                    <label for="form-nivel">Nivel educativo</label>
                                    <select name="nivel" id="form-nivel" class="form-input">
                                        <option value="Preescolar">Preescolar</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="form-grado">Grado</label>
                                    <select name="grado" id="form-grado" class="form-input">
                                        <option>1ro</option>
                                        <option>2do</option>
                                        <option>3ro</option>
                                        <option>4to</option>
                                        <option>5to</option>
                                        <option>6to</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Actualizar Alumno" name="btnModificarAlumno" class="submit-btn" />
                                </div>
                            </form>
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
            <a href="#">Contáctenos</a>
        </div>
        <div class="footer-right">
            <strong>&copy; 2024 Instituto Hispanoamericano Méxicano</strong>
        </div>
    </footer>
    <script>
function showForm(id, nombre, apellidoP, apellidoM, edad, curp, nivelEducativo, grado) {
    // Rellenar los campos del formulario con los datos del alumno
    document.getElementById('form-id').value = id;
    document.getElementById('form-nombre').value = nombre;
    document.getElementById('form-apellidoP').value = apellidoP;
    document.getElementById('form-apellidoM').value = apellidoM;
    document.getElementById('form-fechaN').value = edad;
    document.getElementById('form-curp').value = curp;
    document.getElementById('form-nivel').value = nivelEducativo;
    document.getElementById('form-grado').value = grado;

    // Mostrar el formulario
    document.getElementById('editForm').style.display = 'block';
}

function hideForm() {
    // Ocultar el formulario
    document.getElementById('editForm').style.display = 'none';
}
</script>
    <script src="/src/script/tables.js"></script>
    <script src="/src/script/sidebar.js"></script>
</body>

</html>