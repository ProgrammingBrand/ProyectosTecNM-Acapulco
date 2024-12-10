// Función para re-inicializar las pestañas
function initTabs() {
    document.querySelectorAll('[role="tab"]').forEach(tab => {
        tab.removeEventListener('click', tabClickHandler); // Elimina eventos anteriores

        // Agrega un nuevo event listener para cada tab
        tab.addEventListener('click', tabClickHandler);
    });
}

// Manejador de eventos de click para las pestañas
function tabClickHandler(e) {
    // Desactivar todas las pestañas y contenidos
    document.querySelectorAll('[role="tab"]').forEach(t => t.setAttribute('aria-selected', 'false'));
    document.querySelectorAll('[role="tabpanel"]').forEach(panel => panel.classList.remove('active'));
    
    // Activar la pestaña seleccionada
    e.target.setAttribute('aria-selected', 'true');
    
    // Mostrar el contenido correspondiente
    const targetId = e.target.getAttribute('href').substring(1);
    document.getElementById(targetId).classList.add('active');
}

// Inicializar las pestañas
initTabs();
