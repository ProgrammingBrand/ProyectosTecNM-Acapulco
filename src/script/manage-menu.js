document.addEventListener("DOMContentLoaded", function() {
    // Seleccionar todas las pestañas
    const tabLinks = document.querySelectorAll('.nav-link');
    const tabContents = document.querySelectorAll('.tab-pane');

    // Función para activar una pestaña
    function activateTab(event) {
        // Desactivar todas las pestañas y contenidos
        tabLinks.forEach(link => link.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active', 'show'));

        // Activar la pestaña seleccionada
        const targetTab = event.target;
        const targetContent = document.querySelector(targetTab.getAttribute('href'));

        targetTab.classList.add('active');
        targetContent.classList.add('active', 'show');
    }

    // Asignar el evento de clic a cada pestaña
    tabLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            activateTab(event);
        });
    });

    // Inicializar la primera pestaña como activa por defecto
    if (tabLinks.length > 0) {
        tabLinks[0].classList.add('active');
        tabContents[0].classList.add('active', 'show');
    }
});
