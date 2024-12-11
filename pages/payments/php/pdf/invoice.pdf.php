<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/src/lib/pdf/tcpdf.php');  // Asegúrate de que la ruta sea correcta

// Crear un nuevo objeto TCPDF
$pdf = new TCPDF();

// Añadir una página
$pdf->AddPage();

// Establecer la fuente
$pdf->SetFont('helvetica', '', 12);

// Título de la factura
$pdf->Cell(0, 10, 'Factura de Servicios Educativos', 0, 1, 'C');
$pdf->Ln(10);

// Información del Alumno
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(100, 10, 'Datos del Alumno', 0, 1);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(50, 10, 'Nombre:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_alumno']['Nombre']) . ' ' .
            htmlspecialchars($_SESSION['results_alumno']['ApellidoP']) . ' ' .
            htmlspecialchars($_SESSION['results_alumno']['ApellidoM']), 0, 1);

$pdf->Cell(50, 10, 'CURP:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_alumno']['CURP']), 0, 1);

$pdf->Cell(50, 10, 'Nivel Educativo:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_alumno']['NivelEducativo']), 0, 1);

$pdf->Cell(50, 10, 'Grado:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_alumno']['Grado']), 0, 1);

$pdf->Ln(10);  // Salto de línea

// Información del Padre
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(100, 10, 'Datos del Padre', 0, 1);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(50, 10, 'Nombre:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_padre']['Nombre']) . ' ' .
            htmlspecialchars($_SESSION['results_padre']['ApellidoP']) . ' ' .
            htmlspecialchars($_SESSION['results_padre']['ApellidoM']), 0, 1);

$pdf->Cell(50, 10, 'RFC:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_padre']['RFC']), 0, 1);

$pdf->Cell(50, 10, 'Régimen Fiscal:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_padre']['RegimenFiscal']), 0, 1);

$pdf->Cell(50, 10, 'Dirección:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_padre']['Direccion']) . ' ' .
            htmlspecialchars($_SESSION['results_padre']['CP']), 0, 1);

$pdf->Ln(10);  // Salto de línea

// Detalle de la factura: Conceptos
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(95, 10, 'Concepto', 1, 0, 'C');
$pdf->Cell(30, 10, 'Precio', 1, 0, 'C');
$pdf->Cell(30, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(35, 10, 'Total', 1, 1, 'C');

// Datos de los conceptos (simulados)
$pdf->SetFont('helvetica', '', 10);
$items = [
    ['Concepto 1', 100, 2],  // Concepto, Precio Unitario, Cantidad
    ['Concepto 2', 200, 1],
    ['Concepto 3', 150, 3]
];

$total = 0;
foreach ($items as $item) {
    $subTotal = $item[1] * $item[2];
    $total += $subTotal;
    $pdf->Cell(95, 10, $item[0], 1, 0, 'C');
    $pdf->Cell(30, 10, '$' . number_format($item[1], 2), 1, 0, 'C');
    $pdf->Cell(30, 10, $item[2], 1, 0, 'C');
    $pdf->Cell(35, 10, '$' . number_format($subTotal, 2), 1, 1, 'C');
}

$pdf->Ln(10);  // Salto de línea

// Calcular impuestos (Ejemplo: IVA 16%)
$taxes = $total * 0.16;
$finalTotal = $total + $taxes;

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(95, 10, 'Subtotal', 1, 0, 'C');
$pdf->Cell(30, 10, '$' . number_format($total, 2), 1, 1, 'C');

$pdf->Cell(95, 10, 'Impuestos (16%)', 1, 0, 'C');
$pdf->Cell(30, 10, '$' . number_format($taxes, 2), 1, 1, 'C');

$pdf->Cell(95, 10, 'Total', 1, 0, 'C');
$pdf->Cell(30, 10, '$' . number_format($finalTotal, 2), 1, 1, 'C');

// Salto de línea
$pdf->Ln(10);

// Método de pago
$pdf->Cell(50, 10, 'Método de Pago:', 0, 0);
$pdf->Cell(0, 10, htmlspecialchars($_SESSION['results_padre']['MetodoPago']), 0, 1);

// Salida del archivo PDF
$pdf->Output('factura_estudio.pdf', 'I');  // 'I' para visualizar en el navegador, 'D' para descargar
?>
