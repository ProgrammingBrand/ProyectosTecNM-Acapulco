document.querySelectorAll('[role="tab"]').forEach(tab => {
    tab.addEventListener('click', (e) => {
        // Desactivar todas las pestañas y contenidos
        document.querySelectorAll('[role="tab"]').forEach(t => t.setAttribute('aria-selected', 'false'));
        document.querySelectorAll('[role="tabpanel"]').forEach(panel => panel.classList.remove('active'));
        
        // Activar la pestaña seleccionada
        e.target.setAttribute('aria-selected', 'true');
        
        // Mostrar el contenido correspondiente
        const targetId = e.target.getAttribute('href').substring(1);
        document.getElementById(targetId).classList.add('active');
    });
});
