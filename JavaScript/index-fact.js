function abrirPopup() {
    // Especifica la URL del archivo que deseas abrir
    var url = "/Common/facturacion.html"; // Ruta de tu archivo en el hosting

    // Variables para el tamaño de la ventana
    var width, height;

    // Ajustes según el tamaño de pantalla
    if (window.screen.width >= 1024 && window.screen.width <= 1599 && window.screen.height <= 2068) {
        width = 800;
        height = 500;
    } else if (window.screen.width >= 1600 && window.screen.height >= 900) {
        width = 1024;
        height = 700;
    } else {
        // Tamaño por defecto si no se cumple ninguna condición
        width = 600;
        height = 400;
    }

    // Abre la ventana popup con dimensiones específicas
    window.open(
        url, // URL del archivo
        "popupWindow", // Nombre de la ventana
        `width=${width},height=${height},left=100,top=100,resizable=yes,scrollbars=yes` // Opciones de la ventana
    );
}
