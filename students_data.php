<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'facturas'
) or die(mysqli_error($mysqli));

if (isset($_POST['btnRegistrarAlumno'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $curp = $_POST['curp'];
    $nivel = $_POST['nivel'];
    $grado = $_POST['grado'];

    // Validar que el año sea 2009 o posterior
    if ($anio < 2009) {
        echo "El año debe ser 2009 o posterior.";
        exit;
    }

    // Validar la fecha
    if (!checkdate($mes, $dia, $anio)) {
        echo "La fecha de nacimiento no es válida.";
        exit;
    }

    $fechaNacimiento = "$anio-$mes-$dia"; // Formato YYYY-MM-DD

    // Guardar en la base de datos
    $usuario = $_POST["nombre"];
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
    $curp = $_POST["curp"];
    $nivel = $_POST["nivel"];
    $grado = $_POST["grado"];

    $insert_alumno = $conn->query("INSERT INTO alumnos (Nombre, apellidoP, apellidoM, FechaN, CURP, NivelEducativo, Grado) 
        VALUES ('$usuario', '$apellidoP', '$apellidoM', '$fechaNacimiento','$curp', '$nivel', '$grado')");


    echo '<div class="alert alert-success">Registrado correctamente</div>';
}

if (isset($_POST['btnModificarAlumno'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $fechaN = $_POST['fechaN'];
    $curp = $_POST['curp'];
    $nivelEducativo = $_POST['nivel'];
    $grado = $_POST['grado'];

    $query = "UPDATE alumnos SET 
                    Nombre = '$nombre',
                    ApellidoP = '$apellidoP',
                    ApellidoM = '$apellidoM',
                    FechaN = '$fechaN',
                    CURP = '$curp',
                    NivelEducativo = '$nivelEducativo',
                    Grado = '$grado'
                  WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo '<div class="alert alert-success">Modificado correctamente</div>';
    } 
}


if (isset($_POST['btnEliminarAlumno'])) {
    $id = $_POST['id'];
    $delete_alumno = $conn->query("DELETE FROM alumnos WHERE id = '$id'");

    echo '<div class="alert alert-success">Eliminado correctamente</div>';
}

?>