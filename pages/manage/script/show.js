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