<?php
// Incluir la librería TCPDF
require_once($_SERVER['DOCUMENT_ROOT'].'/src/lib/pdf/tcpdf.php');

// Desactivar la visualización de errores
ini_set('display_errors', 0); 
error_reporting(E_ALL);

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnGenerar'])) {

    // Recoger los datos del formulario
    $conceptos = isset($_POST['item_1']) ? $_POST['item_1'] : [];
    $precios = isset($_POST['price']) ? $_POST['price'] : [];
    $subtotal = isset($_POST['subAmount']) ? $_POST['subAmount'] : '';
    $impuestos = isset($_POST['taxes']) ? $_POST['taxes'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';
    $metodo_pago = isset($_POST['pay']) ? $_POST['pay'] : '';

    // Crear una instancia de TCPDF
    $pdf = new TCPDF();
    $pdf->AddPage(); // Agregar una página al PDF

    // Establecer título del documento
    $pdf->SetTitle('Factura Generada');
    
    // Establecer la fuente
    $pdf->SetFont('helvetica', '', 12);

    // Título de la factura
    $pdf->Cell(0, 10, 'Factura Generada', 0, 1, 'C');
    $pdf->Ln(10);

    // Agregar los conceptos
    $pdf->Cell(0, 10, 'Conceptos:', 0, 1);
    foreach ($conceptos as $index => $concepto) {
        $pdf->Cell(0, 10, 'Concepto ' . ($index + 1) . ': ' . $concepto, 0, 1);
    }

    // Agregar los precios
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Precios:', 0, 1);
    foreach ($precios as $index => $precio) {
        $pdf->Cell(0, 10, 'Precio ' . ($index + 1) . ': $' . $precio, 0, 1);
    }

    // Agregar el subtotal, impuestos y total
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Subtotal: $' . $subtotal, 0, 1);
    $pdf->Cell(0, 10, 'Impuestos: $' . $impuestos, 0, 1);
    $pdf->Cell(0, 10, 'Total: $' . $total, 0, 1);

    // Agregar el método de pago
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Método de Pago: ' . $metodo_pago, 0, 1);

    // Salvar o mostrar el PDF
    $pdf->Output('factura_generada.pdf', 'I'); // Muestra el PDF en el navegador
    exit(); // Asegurarse de que el script termine después de generar el PDF
}
?>
