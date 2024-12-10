const submenuToggles = document.querySelectorAll('.submenu-toggle');

submenuToggles.forEach(toggle => {
    toggle.addEventListener('click', function (e) {
        e.preventDefault(); // Prevenir la acción predeterminada del enlace

        const submenu = this.nextElementSibling; // Obtener el siguiente elemento (el submenú)
        submenu.classList.toggle('active'); // Alternar la clase 'active' para mostrar/ocultar el submenú
    });
});
